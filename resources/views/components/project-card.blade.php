<div class="container mb-3">
    <div class="row">
        <div class="col col-md-2 offset-md-2 text-right bg-light rounded-3 py-2">
            <img src="{{ $thumbnail }}" class="w-100"/>
        </div>
        <div class="col col-md-6 text-start">
            {{ $slot }}
        </div>
    </div>
</div>
