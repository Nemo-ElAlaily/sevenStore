<form class="navbar-search" method="get" action="{{ route('front.shop') }}">
    <label class="sr-only screen-reader-text" for="search">Search for:</label>
    <div class="input-group">
        <input type="text" id="search" class="form-control search-field" dir="ltr" value="{{ request()->search }}"
            name="search" placeholder="Search for products" />
        <div class="input-group-addon search-categories">
            <select name='product_cat' id='product_cat' class='postform resizeselect'>
                <option value='0' selected='selected'>All Categories</option>
                @foreach ($main_categories as $main_category)
                    <option class="level-0" value="{{ $main_category->id }}">{{ $main_category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group-btn">
            <input type="hidden" id="search-param" name="post_type" value="{{ request()->search }}" />
            <button type="submit" class="btn btn-secondary"><i class="ec ec-search"></i></button>
        </div>
    </div>
</form>
