<div class="div">
    <div class="modale opened" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-header">
                <h2 class="text-red-400">Helaas</h2>
            </div>
            <div class="modal-body">
                Deze functie is gesloten
            </div>
            <div class="modal-footer">


                Vraag een administrator om deze weer aan te zetten            </div>
        </div>
    </div>
</div>
<style>
    .opened .modal-dialog {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        transform: translate(0, 0);
    }
    .modale:before {
        content: "";
        display: none;
        background: rgb(0 0 0 / 12%);
        position: fixed;
        top: 385px;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 10;
    }
    .opened:before {
        display: block;
    }
    .modal-dialog {
        background: #fefefe;
        border: #333333 solid 0px;
        border-radius: 5px;
        margin-left: -200px;
        text-align:center;
        position: fixed;
        left: 50%;
        top: 485px;
        z-index: 11;
        width: 360px;

    }
    .modal-body {
        padding: 20px;
    }
    .modal-body input{
        width:200px;
        padding:8px;
        border:1px solid #ddd;
        color:#888;
        outline:0;
        font-size:14px;
        font-weight:bold
    }
    .modal-header,
    .modal-footer {
        padding: 10px 20px;
    }
    .modal-header {
        border-bottom: #eeeeee solid 1px;
    }
    .modal-header h2 {
        font-size: 20px;
    }
</style>
