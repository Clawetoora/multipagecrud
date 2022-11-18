<div class="form-container">

<form class=" login-form"id="forma" action="" method="GET" >
    <h4 class="mb-3">Choose your options</h4>
    <div class="form-group mb-3">
        <label for="f2">Brand</label>
        <select class="form-select" name="carBrand">
        <option disabled selected value="">Car brand...</option>
         <?php foreach ($carBrands as $key => $bc) {?>
            <option value="<?=$bc->id?>"><?=$bc->brand?></option>
        <?php }?>
    </select>
    </div>
    <div class="form-group mb-3">
        <label class="mb-2">Price range</label>
        <div class="price-range">
            <label>From</label>
            <input type="number" name="from" class="fromto">
            <label>To</label>
            <input type="number" name="to" class="fromto">
        </div>
    </div>
    <div class="form-group">

        <label class="mb-2">Sort by</label>
        <div>
            <select class="form-select" name="sort">
                <option disabled selected value="0">Sort by...</option>
                <option value="1">Price from lowest</option>
                <option value="2">Price from highest</option>
                <option value="3">Name form a-z</option>
                <option value="4">Name from z-a</option>
            </select>
        </div>
    </div>

            <button type="submit" name="filter" class="btn-save mt-3 mb-3">Find</button>
        </form>

        <form class="d-flex flex-column search-form" role="search">
        <label class="mb-2">Or use search</label>
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
                name="search"
              />
              <button class="btn btn-search" type="submit">
                Search
              </button>
            </form>
</div>