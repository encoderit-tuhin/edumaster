<span class="d-flex ">
    <li>
        <a href="{{ url('language/en') }}" class="m-0">
            <button type="submit" name="locale" value="en"
                class="btn btn-secondary px-1 mr-2 {{ Session::get('locale', 'en') === 'en' ? 'bg-success' : '' }}">
                EN
            </button>
        </a>
    </li>
    <li>
        <a href="{{ url('language/bn') }}" class="m-0">
            <button type="submit" name="locale" value="bn"
                class="btn btn-secondary px-1 {{ Session::get('locale') === 'bn' ? 'bg-success' : '' }}">
                BN
            </button>
        </a>
    </li>
</span>
