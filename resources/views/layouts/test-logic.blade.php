@if((auth()->user()->role == "Sector HQ" || auth()->user()->role == "CSB 61" || auth()->user()->role == "CSB 64") && auth()->user()->designation != 'Clerk')
@else
