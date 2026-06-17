@extends('layouts.app')

@section('content')
<div x-data="lobby()" x-init="init()" class="max-w-3xl mx-auto">

    <div class="text-center mb-8 animate-fade-up">
        <h1 class="font-arena text-4xl mb-2" style="color:#fff">Salle d'Attente</h1>
        <div style="display:flex;align-items:center;justify-content:center;gap:10px;flex-wrap:wrap">
            <span style="color:#64748b;font-size:14px">Code :</span>
            <span class="font-arena text-2xl" style="color:#3b82f6;letter-spacing:4px" x-text="code"></span>
            <div x-show="isSpeed" class="badge badge-speed">⚡ Mode Rapide</div>
            <div x-show="difficulty === 'facile'" class="badge badge-facile">🟢 Facile</div>
            <div x-show="difficulty === 'normal'" class="badge badge-normal">🔵 Normal</div>
            <div x-show="difficulty === 'difficile'" class="badge badge-difficile">🔴 Difficile</div>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px">

        <div class="card p-6 text-center" style="border-color:rgba(59,130,246,0.3)">
            <p style="font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px">🏠 Hôte</p>
            <div style="width:96px;height:96px;margin:0 auto 12px;border-radius:12px;background:rgba(255,255,255,0.05);border:2px solid rgba(59,130,246,0.4);position:relative;overflow:hidden">
                <img :src="getImageUrl(host?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <template x-for="item in host?.user_items||[]" :key="item.id">
                    <img x-show="item.equipped" :src="getImageUrl(item.item.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                </template>
            </div>
            <p class="font-bold text-lg" x-text="host?.name || '...'" style="color:#e2e8f0"></p>
            <p x-show="hostCategory" class="text-sm mt-1" style="color:#60a5fa" x-text="'🗳️ ' + hostCategory"></p>
        </div>

        <div class="card p-6 text-center" :style="guest ? 'border-color:rgba(139,92,246,0.3)' : ''">
            <p style="font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:16px">👤 Adversaire</p>
            <div style="width:96px;height:96px;margin:0 auto 12px;border-radius:12px;background:rgba(255,255,255,0.05);border:2px solid rgba(139,92,246,0.3);position:relative;overflow:hidden">
                <template x-if="!guest">
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center">
                        <div style="width:32px;height:32px;border:3px solid rgba(139,92,246,0.4);border-top-color:#8b5cf6;border-radius:50%;animation:spin 1s linear infinite"></div>
                    </div>
                </template>
                <img x-show="guest" :src="getImageUrl(guest?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <template x-for="item in guest?.user_items||[]" :key="item.id">
                    <img x-show="item.equipped" :src="getImageUrl(item.item.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                </template>
            </div>
            <p class="font-bold text-lg" x-text="guest?.name || 'En attente...'" :style="guest ? 'color:#e2e8f0' : 'color:#475569'"></p>
            <p x-show="guestCategory" class="text-sm mt-1" style="color:#c084fc" x-text="'🗳️ ' + guestCategory"></p>
        </div>
    </div>

    <div x-show="host && guest && !categoryLocked" class="card p-6 mb-6 animate-fade">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <h3 class="font-bold text-lg">Choisissez un thème</h3>
            <div x-show="categoryTimer > 0" style="background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.3);border-radius:8px;padding:4px 12px">
                <span style="color:#f59e0b;font-weight:700;font-family:monospace" x-text="categoryTimer + 's'"></span>
            </div>
        </div>
        <div style="background:rgba(255,255,255,0.05);border-radius:99px;height:6px;overflow:hidden;margin-bottom:20px">
            <div style="height:100%;border-radius:99px;transition:width 1s linear;background:linear-gradient(90deg,#3b82f6,#8b5cf6)" :style="'width:' + (categoryTimer/30*100) + '%'"></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px">
            <template x-for="cat in categories" :key="cat.id">
                <button @click="voteCategory(cat.id)"
                    :class="myVote === cat.id ? 'category-card active' : 'category-card'"
                    style="transition:all 0.2s cubic-bezier(0.34,1.56,0.64,1)">
                    <div style="font-size:28px;margin-bottom:6px" x-text="cat.emoji"></div>
                    <div style="font-size:12px;font-weight:700;color:#e2e8f0" x-text="cat.label"></div>
                </button>
            </template>
        </div>
    </div>

    <div x-show="categoryLocked" class="text-center mb-6 animate-scale">
        <div style="background:rgba(59,130,246,0.1);border:1px solid rgba(59,130,246,0.3);border-radius:12px;padding:14px 24px;display:inline-block">
            <span style="color:#64748b;font-size:13px">Thème sélectionné : </span>
            <span class="font-bold" style="color:#60a5fa" x-text="finalCategory"></span>
        </div>
    </div>

    <div class="text-center">
        <button @click="startGame()" x-show="host && guest && isHost"
            class="btn btn-green font-arena" style="font-size:18px;padding:16px 48px;width:auto;display:inline-flex">
            🚀 Lancer la Partie !
        </button>
        <p x-show="host && guest && !isHost" style="color:#475569;font-size:15px">En attente que l'hôte lance la partie...</p>
        <div x-show="!guest" style="color:#475569;font-size:15px;display:flex;align-items:center;justify-content:center;gap:10px">
            <div style="width:16px;height:16px;border:2px solid rgba(255,255,255,0.1);border-top-color:#64748b;border-radius:50%;animation:spin 1s linear infinite"></div>
            En attente du second joueur...
        </div>
    </div>
</div>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>

<script>
function lobby() {
    return {
        code: '{{ $room }}',
        host: null, guest: null,
        isHost: false, isSpeed: false,
        difficulty: 'normal',
        myVote: null,
        hostCategory: null, guestCategory: null,
        finalCategory: 'Aléatoire',
        categoryLocked: false,
        categoryTimer: 30,
        categoryInterval: null,
        categories: [
            { id: 'Aléatoire',         emoji: '🎲', label: 'Aléatoire' },
            { id: 'Coupe du Monde',    emoji: '🏆', label: 'Coupe du Monde' },
            { id: 'Histoire de France',emoji: '🇫🇷', label: 'Histoire' },
            { id: 'Jeux Vidéos',       emoji: '🎮', label: 'Jeux Vidéos' },
            { id: 'Animés',            emoji: '⛩️', label: 'Animés' },
            { id: 'Sport',             emoji: '⚽', label: 'Sport' },
        ],

        getImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http')) return path;
            return '/storage/' + path;
        },

        async voteCategory(cat) {
            this.myVote = cat;
            const token = localStorage.getItem('token');
            await fetch(`/api/rooms/{{ $room }}/category`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ category: cat })
            });
        },

        startCategoryTimer() {
            this.categoryTimer = 30;
            clearInterval(this.categoryInterval);
            this.categoryInterval = setInterval(() => {
                this.categoryTimer--;
                if (this.categoryTimer <= 0) {
                    clearInterval(this.categoryInterval);
                    this.categoryLocked = true;
                    if (!this.finalCategory) this.finalCategory = 'Aléatoire';
                }
            }, 1000);
        },

        async init() {
            const token = localStorage.getItem('token');
            const me = await fetch('/api/user', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.ok ? r.json() : null).catch(() => null);
            const room = await fetch(`/api/rooms/{{ $room }}`, { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json()).catch(() => null);

            if (room) {
                this.host = room.room.host;
                this.guest = room.room.guest;
                this.hostCategory = room.room.host_category;
                this.guestCategory = room.room.guest_category;
                this.finalCategory = room.room.category || 'Aléatoire';
                this.isSpeed = !!room.room.is_speed;
                this.difficulty = room.room.difficulty || 'normal';
            }

            if (room?.room?.active_game_id) { location = `/game/${room.room.active_game_id}`; return; }
            if (me) this.isHost = room?.room?.host?.id === me.id;

            if (me && room && room.room.host?.id !== me.id && !room.room.guest) {
                const joinRes = await fetch('/api/rooms/join', {
                    method: 'POST',
                    headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                    body: JSON.stringify({ code: '{{ $room }}' })
                }).then(r => r.json()).catch(() => null);
                if (joinRes?.room) { this.guest = joinRes.room.guest; this.startCategoryTimer(); }
            }

            if (this.host && this.guest) this.startCategoryTimer();

            Echo.channel(`room.{{ $room }}`)
                .listen('.player-joined', (e) => { this.guest = e.guest; this.startCategoryTimer(); })
                .listen('.category-voted', (e) => {
                    this.hostCategory = e.host_category;
                    this.guestCategory = e.guest_category;
                    this.finalCategory = e.final_category;
                    if (e.host_category && e.guest_category) {
                        clearInterval(this.categoryInterval);
                        this.categoryTimer = 0;
                        this.categoryLocked = true;
                    }
                })
                .listen('.game-started', (e) => { location = `/game/${e.game_id}`; });
        },

        async startGame() {
            const token = localStorage.getItem('token');
            const res = await fetch(`/api/games/start/{{ $room }}`, {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token }
            });
            if (res.ok) {
                const game = await res.json();
                location = `/game/${game.game.id}`;
            }
        }
    }
}
</script>
@endsection
