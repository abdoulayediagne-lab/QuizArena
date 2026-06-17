@extends('layouts.app')

@section('content')

<canvas id="fireworks" style="position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:50"></canvas>

<div x-data="result()" x-init="init()" class="max-w-3xl mx-auto text-center" style="position:relative;z-index:1">

    <div class="animate-fade-up mb-8">
        <div x-show="winner === 'draw'" class="mb-2">
            <div class="font-arena text-4xl" style="color:#f59e0b">ÉGALITÉ</div>
            <div style="font-size:48px">🤝</div>
        </div>
        <div x-show="winner !== 'draw'" class="mb-2">
            <div class="font-arena text-5xl glow-yellow" style="color:#fbbf24" x-text="winnerName + ' GAGNE !'"></div>
            <div style="font-size:48px">🏆</div>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:1fr auto 1fr;gap:16px;align-items:center;margin-bottom:32px">

        <div class="card p-6" :style="winner === 'p1' ? 'border-color:rgba(251,191,36,0.5);box-shadow:0 0 30px rgba(251,191,36,0.15)' : ''">
            <div style="width:96px;height:96px;margin:0 auto 12px;border-radius:12px;background:rgba(255,255,255,0.05);border:2px solid rgba(255,255,255,0.1);position:relative;overflow:hidden"
                :class="winner === 'p1' ? 'animate-winner' : (winner === 'p2' ? 'animate-loser' : '')">
                <div x-show="!player1?.avatar_base?.image_path && !player1?.avatar_image_path && !(player1?.user_items||[]).some(i=>i.equipped)" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:40px;color:#475569">👤</div>
                <img x-show="!player1?.avatar_base?.image_path && player1?.avatar_image_path" :src="getImageUrl(player1?.avatar_image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <img x-show="player1?.avatar_base?.image_path" :src="getImageUrl(player1?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <template x-for="item in player1?.user_items||[]" :key="item.id">
                    <img x-show="item.equipped" :src="getImageUrl(item.item.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                </template>
            </div>
            <p class="font-bold text-lg mb-2" x-text="player1?.name || 'Joueur 1'" style="color:#e2e8f0"></p>
            <div class="font-arena text-4xl mb-1" :style="winner === 'p1' ? 'color:#fbbf24' : 'color:#94a3b8'" x-text="score1 + '/10'"></div>
            <div style="font-size:14px;color:#64748b" x-text="coins1 + ' 🪙 gagnés'"></div>
            <div x-show="winner === 'p1'" class="badge badge-speed mt-2 mx-auto" style="display:inline-flex">👑 Vainqueur</div>
        </div>

        <div>
            <div x-show="winner !== 'draw'" style="display:flex;flex-direction:column;align-items:center;gap:12px">
                <div :class="winner === 'p1' ? 'animate-punch' : ''" style="font-size:32px;display:inline-block">
                    <span x-show="winner === 'p1'">👊</span>
                </div>
                <div class="font-arena text-xl" style="color:#475569">VS</div>
                <div :class="winner === 'p2' ? 'animate-punch' : ''" style="font-size:32px;display:inline-block;transform:scaleX(-1)">
                    <span x-show="winner === 'p2'">👊</span>
                </div>
            </div>
            <div x-show="winner === 'draw'" class="font-arena text-xl" style="color:#475569">VS</div>
        </div>

        <div class="card p-6" :style="winner === 'p2' ? 'border-color:rgba(251,191,36,0.5);box-shadow:0 0 30px rgba(251,191,36,0.15)' : ''">
            <div style="width:96px;height:96px;margin:0 auto 12px;border-radius:12px;background:rgba(255,255,255,0.05);border:2px solid rgba(255,255,255,0.1);position:relative;overflow:hidden"
                :class="winner === 'p2' ? 'animate-winner' : (winner === 'p1' ? 'animate-loser' : '')">
                <div x-show="!player2?.avatar_base?.image_path && !player2?.avatar_image_path && !(player2?.user_items||[]).some(i=>i.equipped)" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:40px;color:#475569">👤</div>
                <img x-show="!player2?.avatar_base?.image_path && player2?.avatar_image_path" :src="getImageUrl(player2?.avatar_image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <img x-show="player2?.avatar_base?.image_path" :src="getImageUrl(player2?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                <template x-for="item in player2?.user_items||[]" :key="item.id">
                    <img x-show="item.equipped" :src="getImageUrl(item.item.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                </template>
            </div>
            <p class="font-bold text-lg mb-2" x-text="player2?.name || 'Joueur 2'" style="color:#e2e8f0"></p>
            <div class="font-arena text-4xl mb-1" :style="winner === 'p2' ? 'color:#fbbf24' : 'color:#94a3b8'" x-text="score2 + '/10'"></div>
            <div style="font-size:14px;color:#64748b" x-text="coins2 + ' 🪙 gagnés'"></div>
            <div x-show="winner === 'p2'" class="badge badge-speed mt-2 mx-auto" style="display:inline-flex">👑 Vainqueur</div>
        </div>
    </div>

    <div style="display:flex;gap:12px;justify-content:center">
        <button @click="location='/'" class="btn btn-ghost" style="width:auto;padding:12px 32px">🏠 Accueil</button>
        <button @click="rematch()" class="btn btn-blue" style="width:auto;padding:12px 32px">🔄 Rejouer</button>
    </div>
</div>

<script>

(function() {
    const canvas = document.getElementById('fireworks');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    const particles = [];
    const colors = ['#fbbf24','#f87171','#60a5fa','#34d399','#c084fc','#fb923c','#fff'];

    function Particle(x, y) {
        this.x = x; this.y = y;
        this.vx = (Math.random() - 0.5) * 12;
        this.vy = (Math.random() - 0.5) * 12 - 4;
        this.alpha = 1;
        this.color = colors[Math.floor(Math.random() * colors.length)];
        this.size = Math.random() * 4 + 2;
    }
    Particle.prototype.update = function() {
        this.x += this.vx; this.y += this.vy;
        this.vy += 0.2; this.alpha -= 0.015;
        this.vx *= 0.98;
    };
    Particle.prototype.draw = function() {
        ctx.save();
        ctx.globalAlpha = Math.max(0, this.alpha);
        ctx.fillStyle = this.color;
        ctx.shadowBlur = 8; ctx.shadowColor = this.color;
        ctx.beginPath();
        ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
        ctx.fill();
        ctx.restore();
    };

    function burst(x, y) {
        for (let i = 0; i < 60; i++) particles.push(new Particle(x, y));
    }

    let frame = 0;
    let active = true;
    function loop() {
        if (!active) return;
        frame++;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        if (frame % 40 === 0) burst(Math.random() * canvas.width, Math.random() * canvas.height * 0.6);
        for (let i = particles.length - 1; i >= 0; i--) {
            particles[i].update();
            particles[i].draw();
            if (particles[i].alpha <= 0) particles.splice(i, 1);
        }
        requestAnimationFrame(loop);
    }

    setTimeout(() => { loop(); setTimeout(() => { active = false; ctx.clearRect(0,0,canvas.width,canvas.height); }, 6000); }, 300);
    window._stopFireworks = () => { active = false; };
})();

function result() {
    return {
        player1: null, player2: null,
        score1: 0, score2: 0,
        coins1: 0, coins2: 0,
        winner: 'draw', winnerName: '',

        getImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http')) return path;
            return '/storage/' + path;
        },

        async init() {
            const token = localStorage.getItem('token');
            const [gameData, profile] = await Promise.all([
                fetch(`/api/games/{{ $game }}`, { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json()).catch(() => null),
                fetch('/api/profile', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json()).catch(() => null),
            ]);
            const myId = profile?.user?.id;

            if (gameData?.game) {
                this.player1 = gameData.game.host;
                this.player2 = gameData.game.guest;
                this.score1 = gameData.game.score1 || 0;
                this.score2 = gameData.game.score2 || 0;
                this.coins1 = gameData.game.coins1 || 0;
                this.coins2 = gameData.game.coins2 || 0;

                if (this.score1 > this.score2) {
                    this.winner = 'p1';
                    this.winnerName = this.player1?.name || 'Joueur 1';
                } else if (this.score2 > this.score1) {
                    this.winner = 'p2';
                    this.winnerName = this.player2?.name || 'Joueur 2';
                } else {
                    this.winner = 'draw';
                }

                const iWon = (this.winner === 'p1' && this.player1?.id === myId)
                          || (this.winner === 'p2' && this.player2?.id === myId);
                if (!iWon && window._stopFireworks) window._stopFireworks();
            }
        },

        async rematch() {
            const token = localStorage.getItem('token');
            const roomRes = await fetch('/api/rooms', {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ is_speed: false }),
            });
            const room = await roomRes.json();
            location = `/lobby/${room.room.code}`;
        }
    }
}
</script>
@endsection
