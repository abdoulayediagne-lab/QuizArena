@extends('layouts.app')

@section('content')
<div x-data="soloMenu()" class="max-w-2xl mx-auto">

    <div class="text-center mb-10 animate-fade-up">
        <div style="font-size:56px;margin-bottom:12px">🎯</div>
        <h1 class="font-arena text-4xl mb-3" style="color:#fff">Mode Entraînement</h1>
        <p style="color:#64748b;font-size:15px">Joue seul pour t'améliorer et grimper dans le classement</p>
    </div>

    <div class="card p-5 mb-6">
        <p style="font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px">Difficulté</p>
        <div style="display:flex;gap:10px">
            <template x-for="d in difficulties" :key="d.id">
                <button @click="selectedDiff = d.id"
                    :style="selectedDiff === d.id ? d.activeStyle : ''"
                    style="flex:1;padding:12px 8px;border-radius:10px;font-weight:700;font-size:14px;border:2px solid rgba(255,255,255,0.1);background:rgba(255,255,255,0.04);cursor:pointer;transition:all 0.2s;color:#64748b"
                    :class="selectedDiff === d.id ? '' : 'diff-btn'"
                    x-text="d.label"></button>
            </template>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-bottom:28px">
        <template x-for="cat in categories" :key="cat.id">
            <button @click="!cat.locked && (selected = cat.id)"
                :class="selected === cat.id ? 'category-card active' : 'category-card'"
                :style="cat.locked ? 'opacity:0.45;cursor:not-allowed;filter:grayscale(0.5)' : ''">
                <div style="font-size:32px;margin-bottom:8px" x-text="cat.emoji"></div>
                <div style="font-weight:700;font-size:14px;color:#e2e8f0;margin-bottom:4px" x-text="cat.label"></div>
                <div style="font-size:11px;color:#64748b" x-text="cat.desc"></div>
            </button>
        </template>
    </div>

    <button @click="start()" :disabled="!selected"
        class="btn btn-green font-arena"
        style="font-size:18px;padding:16px 48px;width:100%;opacity:1"
        :style="!selected ? 'opacity:0.4;cursor:not-allowed' : ''">
        🚀 Lancer l'entraînement
    </button>
</div>

<script>
function soloMenu() {
    return {
        selected: 'Aléatoire',
        selectedDiff: 'normal',
        difficulties: [
            { id: 'facile',    label: '🟢 Facile',    activeStyle: 'border-color:#10b981;background:rgba(16,185,129,0.15);color:#10b981' },
            { id: 'normal',    label: '🔵 Normal',    activeStyle: 'border-color:#3b82f6;background:rgba(59,130,246,0.15);color:#60a5fa' },
            { id: 'difficile', label: '🔴 Difficile', activeStyle: 'border-color:#ef4444;background:rgba(239,68,68,0.15);color:#f87171' },
        ],
        categories: [
            { id: 'Aléatoire',          emoji: '🎲', label: 'Aléatoire',        desc: 'Mix de tout' },
            { id: 'Coupe du Monde',     emoji: '🏆', label: 'Coupe du Monde',   desc: 'Football mondial' },
            { id: 'Histoire de France', emoji: '🇫🇷', label: 'Histoire',        desc: 'Histoire française' },
            { id: 'Jeux Vidéos',        emoji: '🎮', label: 'Jeux Vidéos',      desc: 'Culture gaming' },
            { id: 'Animés',             emoji: '⛩️', label: 'Animés',           desc: 'Manga & animés' },
            { id: 'Sport',              emoji: '⚽', label: 'Sport',             desc: 'Toutes disciplines' },
            { id: 'Harry Potter',       emoji: '⚡', label: 'Harry Potter',      desc: 'Monde des sorciers' },
            { id: 'Célébrités',         emoji: '🌟', label: 'Célébrités',        desc: 'People & stars' },
            { id: 'Marques',            emoji: '🏷️', label: 'Marques',           desc: 'Logos & marques' },
            { id: "Film d'animation",   emoji: '🎬', label: "Film d'animation",  desc: 'Disney, Pixar...' },
            { id: 'Laravel',  emoji: '🔒', label: 'Laravel',  desc: 'Débloquer : posséder tous les items', locked: true },
            { id: 'IA',       emoji: '🔒', label: 'IA',        desc: 'Débloquer : posséder tous les items', locked: true },
        ],

        async start() {
            const token = localStorage.getItem('token');
            const res = await fetch('/api/games/solo', {
                method: 'POST',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ category: this.selected, difficulty: this.selectedDiff })
            }).then(r => r.json());
            location = '/solo/' + res.game.id;
        }
    }
}
</script>
@endsection
