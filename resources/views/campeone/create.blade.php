@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Campeone
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default form-floating">
                    <div class="card-header form-floating">
                        <span class="card-title">{{ __('Create') }} Campeones</span>
                    </div>
                    <div class="card-body form-floating">

                        <form method="POST" action="{{ route('campeones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('campeone.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
