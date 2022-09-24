<footer class="text-center">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('legal.notice.show') }}">{{ __('Legal Notice') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('legal.tos.show') }}">{{ __('Terms of Service') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('legal.disclaimer.show') }}">{{ __('Disclaimer') }}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('legal.copyright.show') }}">{{ __('Copyright') }}</a>
        </li>
    </ul>
    <p class="text-white-50">&copy; David Schneider {{ date('Y') }}.</p>
</footer>
