<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    @include('components.leftbar')

    @if (session()->has('success'))
        <div class="container container--narrow">
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{ $slot }}

    @include('components.rightbar')

    <script>
        const forms = document.querySelectorAll('#form-js');

        forms.forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                const url = this.getAttribute('action');
                const token = document.querySelector('meta[name="csrf-token"]').content;
                const postId = this.querySelector('#post-id-js').value;
                const count = this.closest('.likes').querySelector('.likes-num');

                fetch(url, {
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    method: 'post',
                    body: JSON.stringify({
                        id: postId
                    })
                }).then(response => {
                    response.json().then(data => {
                        count.innerHTML = data.count;
                    })
                }).catch(error => {
                    console.log(error)
                });

            });
        });

        function goBack() {
        window.history.back();
    }
    </script>
</body>

</html>
