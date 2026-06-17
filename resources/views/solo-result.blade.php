@extends('layouts.app')

@section('content')
<canvas id="fireworks" style="position:fixed;inset:0;width:100%;height:100%;pointer-events:none;z-index:50"></canvas>

<div x-data="soloResult()" x-init="init()" class="max-w-xl mx-auto text-center" style="position:relative;z-index:1">

    <div class="animate-fade-up mb-8">
        <div style="font-size:56px;margin-bottom:12px" x-text="score >= 7 ? '🏆' : (score >= 5 ? '👍' : '💪')"></div>
        <h1 class="font-arena text-4xl mb-2" style="color:#fff">Entraînement terminé</h1>
        <p class="font-bold text-xl" :style="score >= 7 ? 'color:#10b981' : (score >= 5 ? 'color:#f59e0b' : 'color:#f87171')" x-text="getMessage()"></p>
    </div>

    <div class="card p-8 mb-8 animate-scale">
        <div style="width:100px;height:100px;margin:0 auto 16px;border-radius:14px;background:rgba(255,255,255,0.05);border:2px solid rgba(255,255,255,0.1);position:relative;overflow:hidden"
            :class="score >= 7 ? 'animate-winner' : ''">
            <img :src="getImageUrl(me?.avatar_base?.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
            <template x-for="item in me?.user_items||[]" :key="item.id">
                <img x-show="item.equipped" :src="getImageUrl(item.item.image_path)" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center">
            </template>
        </div>
        <p class="font-bold text-lg mb-6" style="color:#e2e8f0" x-text="me?.name || ''"></p>
        <div class="font-arena mb-2" style="font-size:72px;line-height:1" :style="score >= 7 ? 'color:#fbbf24' : (score >= 5 ? 'color:#60a5fa' : 'color:#94a3b8')" x-text="score + '/10'"></div>
        <p style="color:#475569;font-size:14px" x-text="category ? category : ''"></p>
        <div x-show="coins > 0" style="display:inline-flex;align-items:center;gap:8px;margin-top:12px;background:rgba(245,158,11,0.12);border:1px solid rgba(245,158,11,0.3);border-radius:12px;padding:8px 18px">
            <span class="coin" style="width:20px;height:20px;font-size:11px"></span>
            <span class="font-arena" style="color:#fbbf24;font-size:18px" x-text="'+' + coins + ' pièces gagnées'"></span>
        </div>
    </div>

    <div style="display:flex;gap:12px;justify-content:center">
        <button @click="location='/solo'" class="btn btn-green" style="width:auto;padding:12px 32px">Rejouer</button>
        <button @click="location='/'" class="btn btn-ghost" style="width:auto;padding:12px 32px">Accueil</button>
    </div>
</div>

<script>
(function() {
    const canvas = document.getElementById('fireworks');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth; canvas.height = window.innerHeight;
    const particles = [];
    const colors = ['#fbbf24','#f87171','#60a5fa','#34d399','#c084fc','#fb923c','#fff'];
    function Particle(x,y){this.x=x;this.y=y;this.vx=(Math.random()-.5)*12;this.vy=(Math.random()-.5)*12-4;this.alpha=1;this.color=colors[Math.floor(Math.random()*colors.length)];this.size=Math.random()*4+2;}
    Particle.prototype.update=function(){this.x+=this.vx;this.y+=this.vy;this.vy+=.2;this.alpha-=.015;this.vx*=.98;};
    Particle.prototype.draw=function(){ctx.save();ctx.globalAlpha=Math.max(0,this.alpha);ctx.fillStyle=this.color;ctx.shadowBlur=8;ctx.shadowColor=this.color;ctx.beginPath();ctx.arc(this.x,this.y,this.size,0,Math.PI*2);ctx.fill();ctx.restore();};
    function burst(x,y){for(let i=0;i<60;i++)particles.push(new Particle(x,y));}
    let frame=0,active=false;
    function loop(){if(!active)return;frame++;ctx.clearRect(0,0,canvas.width,canvas.height);if(frame%40===0)burst(Math.random()*canvas.width,Math.random()*canvas.height*.6);for(let i=particles.length-1;i>=0;i--){particles[i].update();particles[i].draw();if(particles[i].alpha<=0)particles.splice(i,1);}requestAnimationFrame(loop);}
    window._showFireworks=function(good){if(!good)return;active=true;loop();setTimeout(()=>{active=false;ctx.clearRect(0,0,canvas.width,canvas.height);},5000);};
})();

function soloResult() {
    return {
        me: null, score: 0, category: '', coins: 0,
        getImageUrl(path){if(!path)return'';if(path.startsWith('http'))return path;return'/storage/'+path;},
        getMessage(){if(this.score>=9)return'Parfait !';if(this.score>=7)return'Excellent !';if(this.score>=5)return'Pas mal !';return"Continue à t'entraîner !";},
        async init(){
            const token=localStorage.getItem('token');
            const profile=await fetch('/api/profile',{headers:{'Authorization':'Bearer '+token}}).then(r=>r.json()).catch(()=>null);
            if(profile?.user)this.me=profile.user;
            const gameData=await fetch('/api/games/{{ $game }}',{headers:{'Authorization':'Bearer '+token}}).then(r=>r.json()).catch(()=>null);
            if(gameData?.game){this.category=gameData.game.category;this.score=gameData.game.score1??0;this.coins=gameData.game.coins??0;}
            if(window._showFireworks)window._showFireworks(this.score>=7);
        }
    }
}
</script>
@endsection
