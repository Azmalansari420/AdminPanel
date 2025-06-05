<div id="snackbar">{{ session('message') }}</div>

@if(session('message'))
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var x = document.getElementById("snackbar");
            x.className = "show";
            setTimeout(function() {
                x.className = x.className.replace("show", "");
            }, 3000);
        });
    </script>
@endif

<style>
    #snackbar {
        visibility: hidden;
        min-width: 250px;
        margin-left: -125px;
        background-color: #000000;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        left: 50%;
        bottom: 30px;
        font-size: 17px;
        transition: visibility 0s linear 0.5s; 
    }

    #snackbar.show {
        visibility: visible;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @keyframes fadein {
        from { bottom: 0; opacity: 0; }
        to { bottom: 30px; opacity: 1; }
    }

    @keyframes fadeout {
        from { bottom: 30px; opacity: 1; }
        to { bottom: 0; opacity: 0; }
    }
</style>
