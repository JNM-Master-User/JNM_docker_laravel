<div class="logo dark:logo"></div>
<style>
    .logo {
        background: url({{asset("/logo.svg")}}) no-repeat;
        width: 200px;
        height:40px;
        display: block;
        text-indent: -9999px;
    }

    .dark .dark\:logo {
        background: url({{asset("/logo-dark.svg")}}) no-repeat;
        width: 200px;
        height:40px;
        display: block;
        text-indent: -9999px;
    }
</style>
