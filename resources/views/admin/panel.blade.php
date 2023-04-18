@include('admin.adminheader')
<div class="content mt-[0rem] border-none">
    <div class="content-panel">
        <div class="vertical-tabs">
            <a onclick="ShowAll()" href="#" class="active">View all</a>
{{--            <a onclick="Toggle('panel.users')" href="#">Users</a>--}}
{{--            <a onclick="Toggle('panel.roles')" href="#">Roles</a>--}}
{{--            <a onclick="Toggle('panel.permissions')" href="#">Permissions</a>--}}
{{--            <a href="#">Browser tools</a>--}}
{{--            <a href="#">Marketplace</a>--}}
        </div>
    </div>
    <div class="content-main">
        <div class="card-grid mt-[1.5rem]">
{{--        <div id="panel.users">@include('admin.adminpanel.panelusers')</div>--}}
{{--        <div id="panel.roles">@include('admin.adminpanel.panelroles')</div>--}}
{{--        <div id="panel.permissions">@include('admin.adminpanel.panelpermissions')</div>--}}
            @include('admin.adminpanel.panelsettings')
            @include('admin.adminpanel.panelusers')
            @include('admin.adminpanel.panelroles')
            @include('admin.adminpanel.panelpermissions')
        </div>
    </div>
</div>
</div>
</main>

<script>

    // var roles = ('panel.roles');
    // window.onload = function() {
    //     var filter = localStorage.getItem('filter');
    //     if (filter === roles) {
    //         var x = document.getElementsByClassName('panel.roles');
    //         x.style.display = "none";
    //     }
    // }
    // function Toggle(id) {
    //     localStorage.setItem("filter", id);
    // }
    //
    // function ShowAll() {
    //     var A = document.getElementById('panel.users');
    //     var B = document.getElementById('panel.roles');
    //     var C = document.getElementById('panel.permissions');
    //
    //     A.style.display = "block";
    //     B.style.display = "block";
    //     C.style.display = "block";
    // }
</script>
