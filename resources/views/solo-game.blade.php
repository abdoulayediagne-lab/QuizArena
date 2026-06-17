@extends('layouts.app')

@section('content')
<div x-data="soloGame()" x-init="init()" class="max-w-2xl mx-auto">

    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:20px" class="animate-fade-up">
        <div class="card" style="padding:10px 18px;display:inline-flex;align-items:center;gap:8px">
            <span style="font-size:12px;color:#64748b;font-weight:700">ROUND</span>
            <span class="font-arena" style="color:#e2e8f0" x-text="currentRound + '/10'"></span>
        </div>
        <div style="font-size:12px;color:#475569;font-family:monospace;font-weight:700"
            :style="!resultPhase && timer <= 5 ? 'color:#f87171' : ''"
            x-text="timer + 's'">
        </div>
        <div class="card" style="padding:10px 18px;display:inline-flex;align-items:center;gap:8px">
            <span style="font-size:12px;color:#64748b;font-weight:700">SCORE</span>
            <span class="font-arena" style="color:#fbbf24" x-text="score + '/10'"></span>
        </div>
    </div>

    <div style="background:rgba(255,255,255,0.05);border-radius:99px;height:8px;overflow:hidden;margin-bottom:20px">
        <div style="height:100%;border-radius:99px;transition:width 1s linear"
            :class="resultPhase ? 'timer-bar timer-bar-blue' : (timer <= 5 ? 'timer-bar timer-bar-red' : (timer <= 15 ? 'timer-bar timer-bar-yellow' : 'timer-bar timer-bar-green'))"
            :style="'width:' + (timer / maxTimer * 100) + '%'"></div>
    </div>

    <div class="card p-8 mb-6 animate-scale">
        <p class="text-2xl font-bold text-center leading-relaxed" style="color:#f1f5f9" x-text="question?.content || 'Chargement...'"></p>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:20px">
        <template x-for="answer in answers" :key="answer.id">
            <button @click="!resultPhase && answerQuestion(answer)" :disabled="resultPhase"
                :class="getAnswerClass(answer.id)" class="answer-btn">
                <span x-text="answer.content"></span>
            </button>
        </template>
    </div>

    <div x-show="resultPhase" class="text-center animate-scale">
        <p x-show="myAnswerId === correctAnswerId && myAnswerId !== null" class="font-bold text-xl" style="color:#10b981">✓ Bonne réponse !</p>
        <p x-show="myAnswerId !== null && myAnswerId !== correctAnswerId" class="font-bold text-xl" style="color:#ef4444">✗ Mauvaise réponse</p>
        <p x-show="myAnswerId === null" class="font-bold text-xl" style="color:#f59e0b">⏰ Temps écoulé</p>
        <p style="color:#475569;font-size:13px;margin-top:6px" x-text="'Prochaine question dans ' + timer + 's...'"></p>
    </div>
</div>

<script>
function soloGame() {
    return {
        gameId: {{ $game }},
        currentRound: 1,
        question: null, answers: [],
        score: 0,
        timer: 30, maxTimer: 30,
        timerInterval: null,
        resultPhase: false,
        correctAnswerId: null,
        myAnswerId: null,

        getAnswerClass(answerId) {
            if (!this.resultPhase) return 'answer-btn';
            if (answerId === this.correctAnswerId) return 'answer-btn correct';
            if (answerId === this.myAnswerId && answerId !== this.correctAnswerId) return 'answer-btn wrong';
            return 'answer-btn opacity-40 cursor-default';
        },

        async init() { await this.loadRound(); },

        async loadRound() {
            const token = localStorage.getItem('token');
            const data = await fetch(`/api/games/{{ $game }}/current-round`, {
                headers: { 'Authorization': 'Bearer ' + token }
            }).then(r => r.ok ? r.json() : null).catch(() => null);

            if (!data) { location = '/solo-result/{{ $game }}'; return; }

            this.currentRound = data.round_number;
            this.question = data.question;
            this.answers = data.answers;
            this.resultPhase = false;
            this.correctAnswerId = null;
            this.myAnswerId = null;
            this.startTimer();
        },

        async answerQuestion(answer) {
            if (this.resultPhase) return;
            this.myAnswerId = answer.id;
            clearInterval(this.timerInterval);

            const token = localStorage.getItem('token');
            const res = await fetch(`/api/games/{{ $game }}/answer-solo`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ round_number: this.currentRound, answer_id: answer.id, time_taken: this.maxTimer - this.timer })
            }).then(r => r.json()).catch(() => null);

            if (res) {
                this.correctAnswerId = res.correct_answer_id;
                if (res.is_correct) this.score++;
            }
            this.resultPhase = true;
            this.startResultTimer();
        },

        startTimer() {
            this.timer = 30; this.maxTimer = 30;
            clearInterval(this.timerInterval);
            this.timerInterval = setInterval(() => {
                this.timer--;
                if (this.timer <= 0) {
                    this.timer = 0; clearInterval(this.timerInterval);
                    this.myAnswerId = null; this.submitTimeout();
                }
            }, 1000);
        },

        async submitTimeout() {
            const token = localStorage.getItem('token');
            const res = await fetch(`/api/games/{{ $game }}/answer-solo`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ round_number: this.currentRound, answer_id: null, time_taken: 30 })
            }).then(r => r.json()).catch(() => null);
            if (res) this.correctAnswerId = res.correct_answer_id;
            this.resultPhase = true;
            this.startResultTimer();
        },

        startResultTimer() {
            this.timer = 3; this.maxTimer = 3;
            clearInterval(this.timerInterval);
            this.timerInterval = setInterval(() => {
                this.timer--;
                if (this.timer <= 0) {
                    this.timer = 0; clearInterval(this.timerInterval);
                    if (this.currentRound >= 10) location = '/solo-result/{{ $game }}';
                    else this.loadRound();
                }
            }, 1000);
        }
    }
}
</script>
@endsection
