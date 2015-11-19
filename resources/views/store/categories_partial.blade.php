<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categorias</h2>
        <div class="panel-group category-products" id="accordian"><!--category-productsr-->

            @foreach($categories as $category)
            <ul class="panel panel-default">
                <li class="panel-heading">
                    <h4 class="panel-title"><a href="{{ route('category.store', $category->id) }}">{{$category->name}}</a></h4>
                </li>
            </ul>
            @endforeach

        </div><!--/category-products-->

    </div>
</div>