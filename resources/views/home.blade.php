<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkly</title>
</head>

<body class="bg-slate-900">
    @vite('resources/css/app.css')

    <header>
        <div class="container px-10 py-5">
            <span class="font-extrabold text-2xl md:text-4xl leading-10 bg-gradient-to-r from-blue-100 to-pink-100 text-transparent bg-clip-text">Linkly</span>
        </div>
    </header>

    <section class="flex justify-center">
        <div class="container flex flex-col items-center">
            <div class=" flex flex-col items-center mt-10">
                <h1 class="font-extrabold text-5xl md:text-6xl bg-gradient-to-r from-blue-100 to-pink-100 text-transparent bg-clip-text text-center ">Shorten Your Looooong Links :)</h1>
                <div class="mt-10">
                    <h3 class="text-white text-center">Linkly is an efficient and easy-to-use URL shortening service that streamlines your online experience.</h3>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="flex items-center bg-gray-800 rounded-full shadow-lg p-2 mt-10 border-solid border-2 @error('long_url') border-red-500 @else border-borderdark-100 @enderror">
                    <form action="/" method="POST">
                        @csrf
                        <input
                            name="long_url"
                            type="text"
                            placeholder="Enter the link here"
                            class="bg-transparent text-gray-300 px-4 py-2 w-64 focus:outline-none rounded-full" />
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-full focus:outline-none">
                            Shorten Now!
                        </button>
                    </form>
                </div>
                @error('long_url')
                <span class="text-red-500 self-start ml-5">{{$message}}</span>
                @enderror('long_url')
            </div>

            <?php if ($shortenUrl != null) : ?>
                <div class="mt-10">
                    <h3 class="text-white text-center">Your generated short link -> <a href="<?= '/' . $shortenUrl; ?>" class="underline" target="_blank"><?= env("APP_URL")."/".$shortenUrl ?></a> </h3>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>