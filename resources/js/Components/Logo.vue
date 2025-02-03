<template>
    <div class="logo">
        <LogoSVG />
        <span class="text-2xl font-bold">Vareška</span>
    </div>
</template>
<script>
import LogoSVG from '@/Components/LogoSVG.vue';

export default {
    name: 'Logo',
    components: { LogoSVG },
};
</script>
<style scoped lang="sass">
.logo
  @apply flex flex-row items-center
</style>
