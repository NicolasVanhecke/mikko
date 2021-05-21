@extends( 'layout' )

@section( 'pagetitle' ) Mikko | Nicolas Vanhecke @endsection

@section( 'content' )

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(/images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    Mikko test
                </span>
            </div>

            <form class="login100-form validate-form" method="POST" action="{{ url( 'calculate-form' ) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="wrap-input100 validate-input m-b-26" data-validate="Input year is required">
                    <span class="label-input100">Input year</span>
                    <input class="input100" type="text" id="year" name="year" placeholder="ex: 2020">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Calculate
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
