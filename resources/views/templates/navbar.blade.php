<div class="horizontal-main hor-menu clearfix">
    <div class="horizontal-mainwrapper container clearfix">
        <nav class="horizontalMenu clearfix">
            <ul class="horizontalMenu-list">
                
                @if (Auth::user()->role == "admin")
                <li aria-haspopup="true">
                    <a href="/dashboard" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard 
                     </a>
                </li>
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        Entry By Number <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('entry_numbers.admin')}}">Semua Pengajuan</a></li>
                        <li><a href="{{ route('entry_numbers.result')}}">Result</a></li>
                        <li><a href="{{ route('entry_numbers.see_all')}}">Lihat Semua</a></li>
                    </ul>
                </li>
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        Entry By Name <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('entry_names.admin')}}">Semua Pengajuan</a></li>
                        <li><a href="{{ route('entry_names.result')}}">Result</a></li>
                        <li><a href="{{ route('entry_names.contingent')}}">Kontingen</a></li>
                    </ul>
                </li>
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                        Pertandingan <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('cabors.index')}}">Cabang Olahraga</a></li>
                        <li><a href="{{ route('classifications.index')}}">Klasifikasi</a></li>
                        <li><a href="{{ route('match_numbers.index')}}">Nomor Pertandingan</a></li>
                        <li><a href="{{ route('venues.index')}}">Venue</a></li>
                        <li><a href="{{ route('competitions.index')}}">Competition</a></li>
                        <li><a href="{{ route('schedules.index')}}">Schedule</a></li>
                    </ul>
                </li>
                <li aria-haspopup="true">
                    <a href="{{ route('contingents.index')}}" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Kota
                    </a>
                </li>
                <li aria-haspopup="true">
                    <a href="#" class="sub-icon">
                        <svg class="hor-icon" x="672" y="96" viewBox="0 0 24 24" height="24" width="24" preserveAspectRatio="xMidYMid meet" focusable="false"><path stroke-linejoin="round" stroke-linecap="round" stroke-width="2" stroke="currentColor" d="M8 16H6a2 2 0 01-2-2v0-8a2 2 0 012-2v0h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v0-8a2 2 0 00-2-2v0h-8a2 2 0 00-2 2v8a2 2 0 002 2v0z"></path></svg>
                        Konten <i class="fa fa-angle-down horizontal-icon"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{ route('news.index')}}">News</a></li>
                        <li><a href="{{ route('sliders.index')}}">Slider</a></li>
                        <li><a href="{{ route('galleries.index')}}">Gallery</a></li>
                        <li><a href="{{ route('downloads.index')}}">Download</a></li>
                    </ul>
                </li>
                    
                @endif
                @if (Auth::user()->role == "contingent")
                <li aria-haspopup="true">
                    <a href="/home" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        Dashboard 
                     </a>
                </li>
                <li aria-haspopup="true">
                    <a href="{{ route('entry_numbers.index')}}" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Entry by Number
                    </a>
                </li>  
                <li aria-haspopup="true">
                    <a href="{{ route('entry_names.index')}}" class="sub-icon">
                        <svg class="hor-icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        Entry by Name
                    </a>
                </li>  
                    
                @endif
                
            </ul>
        </nav>
        <!--Nav end -->
    </div>
</div>