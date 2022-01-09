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