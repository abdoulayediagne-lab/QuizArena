@extends('layouts.app')

@section('content')
<div x-data="avatarBuilder()" x-init="init()" class="max-w-4xl mx-auto">

    <div class="text-center mb-10 animate-fade-up">
        <h1 class="font-arena text-4xl" style="color:#fff">Mon Avatar</h1>
        <p style="color:#475569;font-size:14px;margin-top:6px">Personnalise ton personnage</p>
    </div>

    <div style="display:grid;grid-template-columns:320px 1fr;gap:24px;align-items:start">

        <div>
            <div style="aspect-ratio:1;border-radius:16px;overflow:hidden;background:rgba(255,255,255,0.04);border:2px solid rgba(255,255,255,0.1);position:relative;display:flex;align-items:center;justify-content:center" class="animate-scale">
                <img :src="getImageUrl(selectedBase?.image_path)" style="max-width:100%;max-height:100%;object-fit:contain;object-position:center">
                <template x-for="item in equippedItems" :key="item.id">
                    <img :src="getImageUrl(item.item.image_path)" style="max-width:100%;max-height:100%;object-fit:contain;object-position:center;position:absolute">
                </template>
                <div x-show="!selectedBase" style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;color:#475569;font-size:48px">👤</div>
            </div>
            <div class="text-center mt-4">
                <div class="font-arena text-lg" style="color:#e2e8f0" x-text="name || 'Mon Pseudo'"></div>
            </div>
        </div>

        <div class="space-y-6">

            <div class="card p-5">
                <label style="display:block;font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px">Pseudo</label>
                <input x-model="name" class="input" placeholder="Ton pseudo...">
            </div>

            <div class="card p-5">
                <label style="display:block;font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px">Avatar de base</label>
                <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px">
                    <template x-for="base in bases" :key="base.id">
                        <button @click="selectBase(base)"
                            :style="selectedBase?.id === base.id ? 'border-color:#3b82f6;background:rgba(59,130,246,0.2)' : ''"
                            style="padding:6px;border-radius:10px;border:2px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.04);cursor:pointer;transition:all 0.2s;display:flex;flex-direction:column;align-items:center;gap:4px">
                            <img :src="getImageUrl(base.image_path)" style="width:48px;height:48px;border-radius:8px;object-fit:cover;object-position:center">
                            <span style="font-size:10px;color:#94a3b8;font-weight:600" x-text="base.name"></span>
                        </button>
                    </template>
                </div>
            </div>

            <div class="card p-5">
                <label style="display:block;font-size:11px;color:#64748b;font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px">Mes avatars (boutique)</label>
                <div x-show="ownedItems.length === 0" style="font-size:13px;color:#64748b">
                    Aucun avatar acheté pour l'instant. Va dans la <a href="/shop" style="color:#60a5fa;font-weight:700">Boutique</a> pour en débloquer !
                </div>
                <div x-show="ownedItems.length > 0" style="display:grid;grid-template-columns:repeat(4,1fr);gap:8px">
                    <template x-for="owned in ownedItems" :key="owned.id">
                        <button @click="selectOwnedAvatar(owned)"
                            :style="isEquipped(owned) ? 'border-color:#10b981;background:rgba(16,185,129,0.2)' : ''"
                            style="padding:6px;border-radius:10px;border:2px solid rgba(255,255,255,0.08);background:rgba(255,255,255,0.04);cursor:pointer;transition:all 0.2s;display:flex;flex-direction:column;align-items:center;gap:4px">
                            <img :src="getImageUrl(owned.item.image_path)" style="width:48px;height:48px;border-radius:8px;object-fit:cover;object-position:center">
                            <span style="font-size:10px;color:#94a3b8;font-weight:600" x-text="owned.item.name"></span>
                        </button>
                    </template>
                </div>
            </div>

<button @click="saveAvatar()" class="btn btn-blue font-arena" style="font-size:16px;padding:14px">
                Sauvegarder
            </button>

            <div x-show="toast" x-transition style="text-align:center;padding:12px;border-radius:10px;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);color:#10b981;font-weight:700" x-text="toast"></div>
        </div>
    </div>
</div>

<script>
function avatarBuilder() {
    return {
        name: '', bases: [], selectedBase: null,
        ownedItems: [], equippedItems: [], toast: '',

        async init() {
            const token = localStorage.getItem('token');
            if (!token) { location = '/'; return; }

            const profile = await fetch('/api/profile', { headers: { 'Authorization': 'Bearer ' + token } }).then(r => r.json()).catch(() => null);
            if (!profile?.user) { location = '/'; return; }

            this.name = profile.user.name || '';
            this.selectedBase = profile.user.avatar_base || null;
            this.ownedItems = profile.user.user_items || [];
            this.equippedItems = this.ownedItems.filter(ui => ui.equipped);

            const avatarBases = await fetch('/api/avatar-bases').then(r => r.json());
            this.bases = avatarBases.data || [];
        },

        getImageUrl(path) {
            if (!path) return '';
            if (path.startsWith('http')) return path;
            return '/storage/' + path;
        },

        selectBase(base) { this.selectedBase = base; this.equippedItems = []; },

        selectOwnedAvatar(owned) {
            this.equippedItems = this.isEquipped(owned) ? [] : [owned];
        },
        isEquipped(item) { return this.equippedItems.some(i => i.id === item.id); },

        async saveAvatar() {
            const token = localStorage.getItem('token');
            const res = await fetch('/api/profile', {
                method: 'PUT',
                headers: { 'Authorization': 'Bearer ' + token, 'Content-Type': 'application/json' },
                body: JSON.stringify({ name: this.name, avatar_base_id: this.selectedBase?.id, equipped_items: this.equippedItems.map(i => i.item_id) })
            });
            this.toast = res.ok ? 'Avatar sauvegardé !' : 'Erreur lors de la sauvegarde';
            setTimeout(() => this.toast = '', 3000);
        }
    }
}
</script>
@endsection
