@extends( 'layout' )

@section( 'pagetitle' ) Mikko | Nicolas Vanhecke @endsection

@section( 'content' )

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-form-title" style="background-image: url(/images/bg-01.jpg);">
                <span class="login100-form-title-1">
                    {{ $year }} payments
                </span>
            </div>

            <div class="wrapper-output">
                <div class="output-paydays">
                    <div class="output-paydays-salary">
                        <h4>Salary pay days</h4>
                        @foreach( $salaryPayDays as $month => $salaryPayDay )
                        <p><span>{{ $month }}</span> - {{ $salaryPayDay }}</p>
                        @endforeach
                    </div>

                    <div class="output-paydays-bonus">
                        <h4>Bonus pay days</h4>
                        @foreach( $bonusPayDays as $month => $bonusPayDay )
                            <p><span>{{ $month }}</span> - {{ $bonusPayDay }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <a href="/generate/{{ $year }}" class="clear-link login100-form-btn">Generate CSV</a>
                    <a href="/home" class="clear-link login100-form-btn">Change input year</a>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
