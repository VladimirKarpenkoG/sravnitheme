<form class="search-form" role="search" method="get" action="<?= home_url('/')?>">
    <div class="search__field">
        <input class="search__input" type="text" name="s" value="<?= get_search_query() ?>">
        <button class="search__submit" type="submit" aria-label="start search"><i class="fas fa-search"></i></button>
    </div>
</form>