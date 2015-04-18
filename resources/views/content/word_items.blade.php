  <table class="table table-striped table-bordered table-hover table-condensed col-lg-10">
            <thead class="">
                <tr>
                    <th class="col-lg-3 text-center">
                        STT
                    </th>
                    <th class="col-lg-3 text-center">
                        Word
                    </th>
                    <th class="col-lg-3 text-center">
                        Pronunciation
                    </th>
                    <th class="col-lg-3 text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $word )
                <tr>
                    <td class="col-lg-3 text-center">
                        {{$key+1}}
                    </td>
                    <td class="col-lg-3 text-center">
                        {{$word->word}}
                    </td>
                    <td class="col-lg-3 text-center">
                        {{base64_decode($word->pronunciation)}}
                    </td>
                    <td class="col-lg-3 text-center">
                        <span class="glyphicon glyphicon-volume-up text-center action" onclick="reading('{{ URL::to('/').'/sounds/'.$word->file_name}}');" style="cursor: pointer"></span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>