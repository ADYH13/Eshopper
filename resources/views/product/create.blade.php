@extends('layout.master')
@section('content')

<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Contact For Any Queries</span></h2>
    </div>
    <div class="row px-xl-5">

        <div class="col-lg-6 mb-5">
            <div class="contact-form">
                <h1>Ajout categorie</h1>
                <div id="success"></div>

                <form method="POST" action="{{route('post_categorie')}}"   novalidate="novalidate" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <input type="text" class="form-control" id="nom_categorie" name="nom_categorie" placeholder="Entrez une catégorie"
                            required="required" data-validation-required-message="Please enter a subject" />

                            @error('nom_categorie')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                    </div>
                    <div class="control-group">
                        <input type="file" class="form-control" id="image" name="image" placeholder="Entrez une image"
                            required="required" data-validation-required-message="Please enter a subject" />
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div>

                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                            Message</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-6 mb-5">
            <h1>Ajout Produit</h1>
            <div id="success"></div>
                <form name="sentMessage" id="contactForm" novalidate="novalidate">
                    <div class="control-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name"
                            required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="email" class="form-control" id="email" placeholder="Your Email"
                            required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <input type="text" class="form-control" id="subject" placeholder="Subject"
                            required="required" data-validation-required-message="Please enter a subject" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="control-group">
                        <textarea class="form-control" rows="6" id="message" placeholder="Message"
                            required="required"
                            data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div>
                        <button class="btn btn-primary py-2 px-4" type="submit" id="sendMessageButton">Send
                            Message</button>
                    </div>
                </form>

        </div>
    </div>
</div>
<!-- Contact End -->

@endsection
