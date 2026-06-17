@extends('layouts.app')

@section('content')
<div x-data="history()" x-init="init()" class="max-w-3xl mx-auto">

    <div class="text-center mb-10 animate-fade-up">
        <div style="font-size:56px;margin-bottom:12px">📜</div>
        <h1 class="font-arena text-4xl" style="color:#fff">Historique</h1>
    </div>

    <div class="space-y-3">
        <template x-for="game in games" :key="game.id">
            <div class="card p-5 animate-fade"
                :style="'border-left:3px solid '+sideColor(game,'host')+';border-right:3px solid '+sideColor(game,'guest')">
                <div style="display:grid;grid-template-columns:1fr auto 1fr;gap:16px;align-items:center">

                    <div style="display:flex;align-items:center;gap:12px">
                        <div class="vs-avatar" :style="'border-color:'+sideColor(game,'host')+';box-shadow:0 0 12px '+sideColor(game,'host')+'55'">
                            <div x-show="!game.host?.avatar_base?.image_path && !(game.host?.user_items||[]).some(i=>i.equipped)" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:24px;color:#475569">👤</div>
                            <img :src="getImageUrl(game.host?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                            <template x-for="item in game.host?.user_items||[]" :key="item.id">
                                <img x-show="item.equipped" :src="getImageUrl(item?.item?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                            </template>
                        </div>
                        <div>
                            <div class="font-bold" style="font-size:14px;color:#e2e8f0" x-text="game.host?.name"></div>
                            <div class="font-arena" style="color:#fbbf24;font-size:20px" x-text="game.score1 + '/10'"></div>
                        </div>
                    </div>

                    <div style="text-align:center;min-width:60px">
                        <div class="font-arena font-bold"
                            :style="isWin(game) ? 'color:#10b981' : (isDraw(game) ? 'color:#f59e0b' : 'color:#ef4444')"
                            style="font-size:14px"
                            x-text="isWin(game) ? 'WIN' : (isDraw(game) ? 'NUL' : 'LOSE')"></div>
                        <div style="font-size:12px;color:#fbbf24;margin-top:2px;display:flex;align-items:center;justify-content:center;gap:4px"><span class="coin" style="width:12px;height:12px;font-size:7px"></span><span x-text="game.coins_awarded"></span></div>
                    </div>

                    <div style="display:flex;align-items:center;gap:12px;justify-content:flex-end">
                        <div style="text-align:right">
                            <div class="font-bold" style="font-size:14px;color:#e2e8f0" x-text="game.guest?.name"></div>
                            <div class="font-arena" style="color:#fbbf24;font-size:20px" x-text="game.score2 + '/10'"></div>
                        </div>
                        <div class="vs-avatar" :style="'border-color:'+sideColor(game,'guest')+';box-shadow:0 0 12px '+sideColor(game,'guest')+'55'">
                            <div x-show="!game.guest?.avatar_base?.image_path && !(game.guest?.user_items||[]).some(i=>i.equipped)" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:24px;color:#475569">👤</div>
                            <img :src="getImageUrl(game.guest?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                            <template x-for="item in game.guest?.user_items||[]" :key="item.id">
                                <img x-show="item.equipped" :src="getImageUrl(item?.item?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </template>
        <div x-show="games.length === 0" style="text-align:center;color:#475569;padding:64px 0">Aucun combat pour le moment</div>
    </div>
</div>

<script>
function history() {
    return {
        games: [],
        currentUserId: null,
        getImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http')) return path;
            return '/storage/' + path;
        },
        async init() {
            const token = localStorage.getItem('token');
            const profile = await fetch('/api/profile', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json());
            this.currentUserId = profile.user.id;
            const res = await fetch('/api/games/history', { headers: { 'Authorization': 'Bearer ' + token } });
            if (res.ok) { const data = await res.json(); this.games = data.games || []; }
        },
        isWin(game) {
            return game.host_id === this.currentUserId ? game.score1 > game.score2 : game.score2 > game.score1;
        },
        isDraw(game) { return game.score1 === game.score2; },

        sideColor(game, side) {
            if (game.score1 === game.score2) return '#f59e0b';
            const hostWon = game.score1 > game.score2;
            if (side === 'host') return hostWon ? '#10b981' : '#ef4444';
            return hostWon ? '#ef4444' : '#10b981';
        }
    }
}
</script>
@endsection
