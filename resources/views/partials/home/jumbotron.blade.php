<div class="jumbotron">
    <style>
        .content-header {
            position: absolute;
            top: 0;
            width: 50%;

            margin-left: 5%;
            margin-top: 8rem;
        }

        .content-header h1 {
            color: white;
        }

        .content-header .c-first {
            font-size: 6rem;
        }

        .content-header .c-second {
            font-size: 10rem;
        }

        .jumbotron {
            z-index: -1;
            width: 100%;
        }


        .fade-in {
            opacity: 0;
            animation: fadeIn 3s forwards;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }
    </style>

    <img src="{{ asset('assets/images/items/jumbotron.jpg') }}" alt="Jumbotron" class="jumbotron">
    <span class="right mr-1" style="margin-top: -2rem;">Image by <a
            href="https://www.freepik.com/free-photo/close-up-islamic-new-year-concept_9259636.htm#query=al%20quran&position=2&from_view=search&track=ais">Freepik</a></span>
    <div class="content-header">
        <h1 class="c-first fade-in" id="c-1">Sistem Pakar</h1>
        <h1 class="c-second fade-in" id="c-2">TAJWID</h1>
    </div>
</div>

<script>
</script>
