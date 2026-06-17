@extends('layouts.app')

@section('content')
<div x-data="leaderboard()" x-init="init()" class="max-w-3xl mx-auto">

    <div class="text-center mb-10 animate-fade-up">
        <div style="font-size:56px;margin-bottom:12px">🏆</div>
        <h1 class="font-arena text-4xl" style="color:#fff">Classement</h1>
    </div>

    <div class="card overflow-hidden animate-fade">
        <template x-for="(player, idx) in players" :key="player.id">
            <div class="lb-row"
                :style="idx === 0 ? 'background:rgba(251,191,36,0.06)' : (idx === 1 ? 'background:rgba(148,163,184,0.04)' : (idx === 2 ? 'background:rgba(180,130,70,0.04)' : ''))">

                <div style="width:36px;text-align:center;flex-shrink:0">
                    <span x-show="idx === 0" style="font-size:22px">🥇</span>
                    <span x-show="idx === 1" style="font-size:22px">🥈</span>
                    <span x-show="idx === 2" style="font-size:22px">🥉</span>
                    <span x-show="idx > 2" class="font-arena" style="color:#475569;font-size:16px" x-text="idx + 1"></span>
                </div>

                <div class="lb-avatar" :style="idx === 0 ? 'border-color:rgba(251,191,36,0.5)' : ''">
                    <div x-show="!player.avatar_base?.image_path && !player.avatar_image_path && !(player.user_items||[]).some(i=>i.equipped)" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-size:28px;color:#475569">👤</div>
                    <img x-show="!player.avatar_base?.image_path && player.avatar_image_path" :src="getImageUrl(player.avatar_image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:contain;object-position:center">
                    <img x-show="player.avatar_base?.image_path" :src="getImageUrl(player.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:contain;object-position:center">
                    <template x-for="item in player.user_items||[]" :key="item.id">
                        <img x-show="item.equipped" :src="getImageUrl(item?.item?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:contain;object-position:center">
                    </template>
                </div>

                <div style="flex:1">
                    <div class="font-bold" style="color:#e2e8f0" x-text="player.name"></div>
                    <div style="font-size:12px;color:#475569" x-text="(player.wins||0) + ' victoires · ' + (player.losses||0) + ' défaites'"></div>
                </div>

                <div class="text-right">
                    <div class="font-arena" style="color:#fbbf24;font-size:18px" x-text="getWinRate(player) + '%'"></div>
                    <div style="font-size:11px;color:#475569">taux de victoire</div>
                </div>
            </div>
        </template>
        <div x-show="players.length === 0" style="padding:48px;text-align:center;color:#475569">Aucun joueur pour le moment</div>
    </div>
</div>

<script>
function leaderboard() {
    return {
        players: [],
        getImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http')) return path;
            return '/storage/' + path;
        },
        async init() {
            const token = localStorage.getItem('token');
            const res = await fetch('/api/leaderboard', { headers: { 'Authorization': 'Bearer ' + token } });
            if (res.ok) { const data = await res.json(); this.players = data.players || []; }
        },
        getWinRate(player) {
            const total = (player.wins||0) + (player.losses||0);
            return total === 0 ? 0 : Math.round((player.wins||0) / total * 100);
        }
    }
}
</script>
@endsection
