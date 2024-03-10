<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Formularz kontaktowy') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/sass/app.scss'])
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-12">
                <div id="messages">
                </div>
                <section class="mb-4">
                    <h2 class="h1-responsive font-weight-bold text-center my-4">{{ Str::upper(__('Skontaktuj się z nami')) }}</h2>
                    <div class="row">
                        <div class="col-md-12 mb-md-0 mb-5">
                            <form id="contact-form" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                        <label for="fullname">{{ __('Imię i nazwisko') }}</label>
                                            <input type="text" id="fullname" name="fullname" class="form-control" maxlength="100" value="{{ old('fullname') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                            <label for="phone">{{ __('Numer telefonu') }}</label>
                                            <input type="number" id="phone" name="phone" class="form-control" value="{{ old('phone') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                            <label for="email">{{ __('Adres e-mail') }}</label>
                                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="md-form mb-2">
                                            <label for="attachment">{{ __('Załącznik') }}</label>
                                            <input type="file" id="attachment" name="attachment" class="form-control" accept=".jpg, .pdf" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="md-form mb-2">
                                            <label for="message">{{ __('Treść wiadomości') }}</label>
                                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea" maxlength="500" required>{{ old('message') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center text-md-left mt-3">
                                    <button class="btn btn-primary" type="submit">{{ __('Wyślij') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script type="module">
        var url = "{{ route('contact.form.send') }}";
        var frm = $('#contact-form');
                frm.submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        type: frm.attr('method'),
                        url: url,
                        data: formData,
                        success: function (data) {
                            $('#messages').empty();
                            $('#messages').append('<div class="alert alert-success">'+data.success+'</div');
                        },
                        error: function (data) {
                            $('#messages').empty();
                            $.each(data.responseJSON.errors, function(key,value) {
                                $('#messages').append('<div class="alert alert-danger" id="'+key+'">'+value+'</div');
                            });
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                });
    </script>
</body>
</html>