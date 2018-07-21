<td class="text-center">
    <a href="{{route('edit-currency',['id'=>$currencyId])}}" class="btn btn-primary btn-sm edit-button"
       tabindex="-1" role="button">edit</a>
</td>
<td class="text-center">
    <form action="{{route('delete-currency',['id'=>$currencyId])}}" method="post">
        {!! method_field('delete') !!}
        {!! csrf_field() !!}
        <input type="submit" class="btn btn-primary btn-sm edit-button" value="delete">
    </form>
</td>
