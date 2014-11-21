@extends('privatecontroller.layout')
@section('head')
<script type="text/javascript">
    function theFunction(){
        alert("Prueba");
        return false;
    }
</script>
@stop
@section('container')
<div class="container">
    <?php

        $itemsForShop = "";
        $i = count($allItems);
        for($i;$i>3;$i = $i-3){
            $itemsForShop = $itemsForShop."<div class='row'>
                                <div id = 'row' class='col-lg-4' col-lg-height>
                                    ".$allItems[$i-1]['html']."
                                </div>
                            ".
                            "
                                <div id = 'row' class='col-lg-4 col-lg-height'>
                                    ".$allItems[$i-2]['html']."
                                </div>
                            ".
                            "
                                <div id = 'row' class='col-lg-4 col-lg-height'>
                                    ".$allItems[$i-3]['html']."
                                </div>
                            </div>";

        }

        $col = 0;
        for($l=$i;$l>0;$l--){
            $col++;
        }

        $sizeForColumn = 12/$col;
        for($m=0;$m<$col;$m++){
           $itemsForShop = $itemsForShop."<div class='row'>
               <div class='col-lg-4'>
                   ".$allItems[$i-1]['html']."
               </div>
           </div>";
           $i--;
        }

        echo($itemsForShop);

    ?>


</div>
@stop