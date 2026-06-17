@extends('layouts.app')

@section('content')
<div x-data="shop()" x-init="init()" class="max-w-4xl mx-auto">

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:32px" class="animate-fade-up">
        <div>
            <h1 class="font-arena text-4xl" style="color:#fff">Boutique</h1>
            <p style="color:#475569;font-size:14px;margin-top:4px">Équipez votre avatar avec des objets uniques</p>
        </div>
        <div style="background:rgba(245,158,11,0.1);border:1px solid rgba(245,158,11,0.3);border-radius:12px;padding:10px 20px">
            <span class="font-arena text-xl" style="color:#fbbf24;display:flex;align-items:center;gap:8px"><span class="coin" style="width:20px;height:20px;font-size:11px"></span><span x-text="coins"></span></span>
        </div>
    </div>

    <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:16px">
        <template x-for="item in items" :key="item.id">
            <div class="item-card" :style="item.locked && !isOwned(item.id) ? 'opacity:0.6;filter:grayscale(0.4)' : ''">

                <div style="position:relative;margin-bottom:14px">
                    <img :src="'/storage/' + item.image_path"
                        style="width:100%;height:120px;object-fit:cover;object-position:center;border-radius:10px;background:rgba(255,255,255,0.05)"
                        :style="item.locked && !isOwned(item.id) ? 'filter:brightness(0.4)' : ''">
                    <div x-show="item.locked && !isOwned(item.id)"
                        style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:4px">
                        <span style="font-size:20px;font-weight:bold">LOCKED</span>
                        <span style="font-size:9px;color:#94a3b8;font-weight:700;text-align:center;padding:0 8px;line-height:1.3" x-text="item.unlock_condition_label"></span>
                    </div>
                </div>

                <div class="font-bold text-base mb-1" style="color:#e2e8f0;text-align:center" x-text="item.name"></div>
                <div style="font-size:12px;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px;text-align:center"
                    :class="'rarity-' + (item.locked ? 'legendary' : item.rarity)" x-text="item.locked ? 'Golden' : item.rarity"></div>

                <template x-if="!item.locked">
                    <div style="font-size:18px;font-weight:700;color:#fbbf24;margin-bottom:12px;display:flex;align-items:center;justify-content:center;gap:6px">
                        <span class="coin" style="width:18px;height:18px;font-size:10px"></span>
                        <span x-text="item.price"></span>
                    </div>
                </template>
                <template x-if="item.locked && !isOwned(item.id)">
                    <div style="font-size:11px;color:#64748b;margin-bottom:12px;text-align:center;line-height:1.5" x-text="item.unlock_condition_label"></div>
                </template>
                <template x-if="item.locked && isOwned(item.id)">
                    <div style="font-size:18px;font-weight:700;color:#fbbf24;margin-bottom:12px;text-align:center">Débloqué</div>
                </template>

                <button x-show="!item.locked && !isOwned(item.id)" @click="buyItem(item)"
                    class="btn btn-green" style="padding:10px;font-size:13px">
                    Acheter
                </button>
                <div x-show="isOwned(item.id)"
                    style="padding:10px;text-align:center;border-radius:10px;background:rgba(16,185,129,0.1);border:1px solid rgba(16,185,129,0.3);color:#10b981;font-weight:700;font-size:13px">
                    ✓ Possédé
                </div>
                <div x-show="item.locked && !isOwned(item.id)"
                    style="padding:10px;text-align:center;border-radius:10px;background:rgba(100,116,139,0.1);border:1px solid rgba(100,116,139,0.2);color:#64748b;font-size:12px">
                    Verrouillé
                </div>
            </div>
        </template>
    </div>

    <div x-show="toast" x-transition style="position:fixed;bottom:24px;right:24px;background:rgba(16,185,129,0.9);border-radius:12px;padding:14px 20px;font-weight:700;color:#fff;z-index:999" x-text="toast"></div>
</div>

<script>
function shop() {
    return {
        items: [], coins: 0, toast: '',

        async init() {
            const token = localStorage.getItem('token');
            const shopData = await fetch('/api/shop/items', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json());
            this.items = (shopData.items || []).map(item => ({
                ...item,
                unlock_condition_label: item.unlock_condition === 'all_items + 40/50 Laravel'
                    ? 'Posséder tous les items + 40/50 en Laravel'
                    : item.unlock_condition === 'all_items + 40/50 IA'
                    ? 'Posséder tous les items + 40/50 en IA'
                    : ''
            }));
            const profile = await fetch('/api/profile', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json());
            this.coins = profile.user.coins;
        },

        isOwned(itemId) { return this.items.find(i => i.id === itemId)?.is_owned; },

        async buyItem(item) {
            const token = localStorage.getItem('token');
            const res = await fetch(`/api/shop/buy/${item.id}`, { method: 'POST', headers: { 'Authorization': 'Bearer ' + token } });
            if (res.ok) {
                this.coins = (await res.json()).coins;
                item.is_owned = true;
                this.showToast(item.name + ' acheté !');
            } else {
                this.showToast('Solde insuffisant');
            }
        },

        showToast(msg) {
            this.toast = msg;
            setTimeout(() => this.toast = '', 3000);
        }
    }
}
</script>
@endsection
