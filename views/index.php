<?
echo $context->get("t");

?>
<div class="   pt-5" >

<div class="row">
    <div class="col-4">

        <form id="filterForm">
    <p>Choose elements count</p>
    <select class="form-select" name="countElements" id="countSelect"  >
      <option value="false" selected>Open this select menu</option>
      <option value="1">1</option>
      <option value="3">3</option>
      <option value="5">5</option>
      <option value="10">10</option>
      <option value="20">20</option>
    </select>
    <br>

     
    <p>Choose dates</p>
    <div class="input-group mb-3">
        <input type="date" class="form-control" name="date_from" placeholder="Date from" >
        <input type="date" class="form-control" name="date_to" placeholder="Date to" >
    </div>
    <br>
    <p>Choose views count</p>
    
    <select class="form-select" name="views" id="countSelect"  >
      <option value="false" selected>Open this select menu</option>
      <option value="0_101">< 100</option>
      <option value="99_301">100 - 300</option>
      <option value="299_501">300 - 500</option>
      <option value="499_10001">> 500</option>
    </select>
    <br>
    <p>Choose product</p>
    
    <select class="form-select" name="productId" id="countSelect" aria-label="Default select example">
      <option value="false" selected>Open this select menu</option>
      <?foreach($context->get("products") as $product):?>
      <option value="<?=$product->getId()?>"><?=$product->getName()?></option>
      <?endforeach;?>
    </select>
    <br>

    <button type="submit">Upload</button>
      </form>
    </div>
    <div class="col-8">
        <table class="table-primary table table-striped" id="blogList">
            <?foreach($context->get("collection") as $blog):?>
            <tr class="table-primary">
                <td><?=$blog->getID()?></td>
                <td>
                    <p><?= date('m/d/Y',$blog->getTimeСreate()) ?> <?=$blog->getViews();?></p>
                    <a href="/blog/<?=$blog->getHref()?>"><?=$blog->getTitle();?></a>
                </td>
                
            </tr>
            <?endforeach;?>
        </table>
    </div>
</div>
</div>