    @foreach($categories as $category)
        <a class="text-center btn-sm btn-small btn col-lg-12" style="border:solid 1px;" onclick="category.showItems(this,{{$category->id}});">{{$category->name}}</a>
    @endforeach