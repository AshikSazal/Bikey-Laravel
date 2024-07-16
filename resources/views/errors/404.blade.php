<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            overflow: hidden;
        }
        /* #not-found{
            color: #f85606; 
            font-size: 2rem; 
            font-family: Arial; 
            font-weight: 300;
        }
        .go-home{
            display: flex;
            justify-content: center;
            text-decoration: none;
        }
        #home-button{
            background-color: #1ca3e4; 
            border-color: #1ca3e4;
            cursor: pointer;
            font-weight: bold; 
            padding: 10px 20px; 
            border-radius: 5px; 
            font-family: Arial, Helvetica, sans-serif;
        }
        a{
            color: white;
            text-decoration: none;
        }
        #home-button:hover{
            color: white;
            text-decoration: underline;
        } */

        /* Updated CSS */
        .box-container{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .box {
            display: flex;
            align-items: center;
            justify-content: space-around;
            text-decoration: none;
            color: white;
            background-color: #1ca3e4;
            border: 2px solid #1ca3e4;
            padding: 13px 4px;
            border-radius: 999px;
            overflow: hidden;
            position: relative;
            width: 20%;
        }
        .bg-overlay {
            position: absolute;
            inset: 0;
            background-color: white;
            transform: scaleX(0);
            transform-origin: center;
            transition: transform 0.5s ease-in-out;
        }
        .box:hover .bg-overlay {
            transform: scaleX(1);
        }
        .svg-icon {
            height: 1rem;
            position: relative;
            z-index: 10;
            transition: color 0.5s ease-in-out;
        }
        .box:hover .svg-icon {
            color: #1ca3e4;
        }
        .go-home {
            position: relative;
            z-index: 10;
            font-size: .8rem;
            transition: color 0.5s ease-in-out;
            font-family: Arial, Helvetica, sans-serif;
        }
        .box:hover .go-home {
            color: #1ca3e4;
        }


        .word {
            display: inline-block;
            position: relative;
            font-size: 4rem;
            font-family: Arial, Helvetica, sans-serif;
            color: #f85606;
            margin: 0 5px;
            animation: bounce 1s infinite alternate;
        }
        @keyframes bounce {
            from {
                transform: translateY(0);
            }
            to {
                transform: translateY(-60px);
            }
        }
    </style>
</head>

<body>
    <div style="container">
        <div id="not-found">
            <span class="word">404</span>
            <span class="word">|</span>
            <span class="word">NOT</span>
            <span class="word">FOUND</span>
        </div>
        {{-- <div class="go-home">
            <button id="home-button">
                <a href="{{ route('home') }}">
                    GO HOME
                </a>
            </button>
        </div> --}}
        {{-- <div class="flex justify-center items-center">
            <a href="{{route('home')}}" class="relative flex items-center text-white bg-[#1ca3e4] border-2 border-[#1ca3e4] px-4 py-3 space-x-3 rounded-full overflow-hidden group">
                <span class="absolute inset-0 bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 ease-in-out origin-center"></span>
                <svg height="40" width="40" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6 relative z-10 transition-colors duration-500 ease-in-out group-hover:text-[#1ca3e4]">
                    <path fill="currentColor" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <span class="relative z-10 text-lg transition-colors duration-500 ease-in-out group-hover:text-[#1ca3e4]">GO HOME</span>
            </a>
        </div> --}}
        <div class="box-container">
            <a href="{{route('home')}}" class="box">
                <span class="bg-overlay"></span>
                <svg height="25" width="25" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-icon">
                    <path fill="currentColor" d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                </svg>
                <span class="go-home">GO HOME</span>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const words = document.querySelectorAll('.word');
            words.forEach((word, index) => {
                word.style.animationDelay = `${index * 0.1}s`;
            });
        });
    </script>
</body>

</html>
