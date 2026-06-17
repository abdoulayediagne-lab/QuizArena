@extends('layouts.app')

@section('content')
<div x-data="game()" x-init="init()" class="max-w-2xl mx-auto">

    <div style="display:grid;grid-template-columns:1fr auto 1fr;gap:12px;align-items:center;margin-bottom:24px" class="animate-fade-up">
        <div class="card p-4 text-center">
            <div style="font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px" x-text="player1Name">Joueur 1</div>
            <div class="font-arena text-4xl glow-blue" style="color:#60a5fa" x-text="scores.player1">0</div>
        </div>
        <div class="text-center">
            <div style="font-size:12px;color:#475569;font-weight:700">ROUND</div>
            <div class="font-arena text-xl" style="color:#e2e8f0" x-text="currentRound + '/10'">1/10</div>
        </div>
        <div class="card p-4 text-center">
            <div style="font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:4px" x-text="player2Name">Joueur 2</div>
            <div class="font-arena text-4xl glow-purple" style="color:#c084fc" x-text="scores.player2">0</div>
        </div>
    </div>

    <div class="mb-6">
        <div style="display:flex;justify-content:space-between;font-size:12px;color:#475569;margin-bottom:6px">
            <span x-text="resultPhase ? '⏭️ Prochaine question dans...' : '⏱️ Temps restant'"></span>
            <span style="font-family:monospace;font-weight:700" :style="!resultPhase && timer <= 5 ? 'color:#f87171' : ''" x-text="timer + 's'"></span>
        </div>
        <div style="background:rgba(255,255,255,0.05);border-radius:99px;height:8px;overflow:hidden">
            <div style="height:100%;border-radius:99px;transition:width 1s linear"
                :class="resultPhase ? 'timer-bar timer-bar-blue' : (timer <= 5 ? 'timer-bar timer-bar-red' : (timer <= 15 ? 'timer-bar timer-bar-yellow' : 'timer-bar timer-bar-green'))"
                :style="'width:' + (timer / maxTimer * 100) + '%'"></div>
        </div>
    </div>

    <div class="card p-8 mb-6 animate-scale">
        <p class="text-2xl font-bold leading-relaxed text-center" style="color:#f1f5f9" x-text="question?.content || 'Chargement...'"></p>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px">
        <template x-for="answer in answers" :key="answer.id">
            <button
                @click="!answered && !resultPhase && answerQuestion(answer)"
                :disabled="answered || resultPhase"
                :class="getAnswerClass(answer.id)"
                class="answer-btn">
                <span x-text="answer.content"></span>
            </button>
        </template>
    </div>

    <div class="text-center animate-fade">
        <p x-show="answered && !resultPhase" style="color:#64748b;font-size:14px">
            <span style="display:inline-flex;align-items:center;gap:8px">
                <span style="width:14px;height:14px;border:2px solid rgba(255,255,255,0.1);border-top-color:#64748b;border-radius:50%;animation:spin 1s linear infinite;display:inline-block"></span>
                En attente de l'autre joueur...
            </span>
        </p>
        <p x-show="resultPhase && myAnswerId === correctAnswerId" class="font-bold" style="color:#10b981;font-size:16px">✓ Bonne réponse !</p>
        <p x-show="resultPhase && myAnswerId !== null && myAnswerId !== correctAnswerId" class="font-bold" style="color:#ef4444;font-size:16px">✗ Mauvaise réponse</p>
        <p x-show="resultPhase && myAnswerId === null" class="font-bold" style="color:#f59e0b;font-size:16px">⏰ Temps écoulé</p>
    </div>
</div>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>

<script>
function game() {
    return {
        gameId: {{ $game }},
        currentRound: 1,
        question: null, answers: [],
        answered: false,
        timer: 30, maxTimer: 30,
        scores: { player1: 0, player2: 0 },
        timerInterval: null,
        resultPhase: false,
        correctAnswerId: null,
        myAnswerId: null,
        pendingQuestion: null,
        player1Name: 'Joueur 1',
        player2Name: 'Joueur 2',

        getAnswerClass(answerId) {
            if (!this.resultPhase) {
                if (this.myAnswerId === answerId) return 'answer-btn selected';
                if (this.answered) return 'answer-btn' + ' opacity-50 cursor-not-allowed';
                return 'answer-btn';
            }
            if (answerId === this.correctAnswerId) return 'answer-btn correct';
            if (answerId === this.myAnswerId && answerId !== this.correctAnswerId) return 'answer-btn wrong';
            return 'answer-btn opacity-40 cursor-default';
        },

        async init() {
            const token = localStorage.getItem('token');

            const current = await fetch(`/api/games/{{ $game }}/current-round`, {
                headers: { 'Authorization': 'Bearer ' + token }
            }).then(r => r.ok ? r.json() : null).catch(() => null);

            if (current) {
                this.currentRound = current.round_number;
                this.question = current.question;
                this.answers = current.answers;
                this.startQuestionTimer();
            }

            Echo.channel(`game.{{ $game }}`)
                .listen('.question-broadcasted', (e) => {
                    if (this.resultPhase) { this.pendingQuestion = e; return; }
                    this.loadQuestion(e);
                })
                .listen('.round-result', (e) => {
                    this.scores = { player1: e.player1_score, player2: e.player2_score };
                    this.correctAnswerId = e.correct_answer_id;
                    this.resultPhase = true;
                    clearInterval(this.timerInterval);
                    this.timer = 3; this.maxTimer = 3;
                    this.startResultTimer();
                })
                .listen('.game-finished', () => { location = `/result/{{ $game }}`; });
        },

        loadQuestion(e) {
            this.currentRound = e.round_number;
            this.question = e.question;
            this.answers = e.answers;
            this.answered = false;
            this.myAnswerId = null;
            this.correctAnswerId = null;
            this.resultPhase = false;
            this.pendingQuestion = null;
            this.timer = 30; this.maxTimer = 30;
            this.startQuestionTimer();
        },

        async answerQuestion(answer) {
            this.answered = true;
            this.myAnswerId = answer.id;
            const token = localStorage.getItem('token');
            await fetch(`/api/games/{{ $game }}/answer`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ round_number: this.currentRound, answer_id: answer.id, time_taken: this.maxTimer - this.timer })
            });
        },

        async submitTimeout() {
            const token = localStorage.getItem('token');
            await fetch(`/api/games/{{ $game }}/answer`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ round_number: this.currentRound, answer_id: null, time_taken: 30 })
            });
        },

        startQuestionTimer() {
            this.timer = 30; this.maxTimer = 30;
            clearInterval(this.timerInterval);
            this.timerInterval = setInterval(() => {
                this.timer--;
                if (this.timer <= 0) {
                    this.timer = 0;
                    clearInterval(this.timerInterval);
                    if (!this.answered) { this.answered = true; this.submitTimeout(); }
                }
            }, 1000);
        },

        startResultTimer() {
            clearInterval(this.timerInterval);
            this.timerInterval = setInterval(() => {
                this.timer--;
                if (this.timer <= 0) {
                    this.timer = 0;
                    clearInterval(this.timerInterval);
                    if (this.pendingQuestion) {
                        this.loadQuestion(this.pendingQuestion);
                    } else {
                        const token = localStorage.getItem('token');
                        fetch(`/api/games/{{ $game }}/current-round`, { headers: { 'Authorization': 'Bearer ' + token } })
                            .then(r => r.ok ? r.json() : null).then(data => { if (data) this.loadQuestion(data); });
                    }
                }
            }, 1000);
        }
    }
}
</script>
@endsection
