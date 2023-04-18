

<?php
$info_tab = 'Intergrations and connected apps';
$info_sub = 'Supercharge your workflow and connect the tool you use every day.';
$info_button = '';
?>

<div class="content-header">
    <div class="content-header-intro">
        <h2>{{ $info_tab }}</h2>
        <p>{{ $info_sub }}</p>
    </div>
    <div class="content-header-actions">
        <a href="#" class="button">
            <i class="ph-faders-bold"></i>
            <span>Filters</span>
        </a>
        <?php

        $route = Route::current();
        $route = $route->getname();
        if ($route == 'panel') {
            if ($requestAmount === 1) {
                $requestName = 'New request';
            } else {
                $requestName = 'New requests';
            }
        }
        ?>
        @if($route == 'panel')
            @if($requestAmount > 0)
                <a href="/admin/requests" class="button text-orange-400 border-orange-400">
                    <i class="ph-plus-bold"></i>
                    <span>{{ $requestAmount }} {{ $requestName }}</span>
                </a>
            @endif
        @endif
    </div>
</div>

