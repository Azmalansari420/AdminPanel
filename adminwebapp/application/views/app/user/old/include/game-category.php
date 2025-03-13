<style>
    

    .balance {
        border-radius: 24px;
        border: 1px solid var(--border-color, #E5E5E5);
        background: var(--white-color, #fff);
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        padding: 3px 3px 3px 11px;
        line-height: normal;
    }
    .tabs button {
        font-size: 10px;
        padding: 5px 0px;
    }
</style>
<div class="tabs mt-5 d-flex ">
              <button class="btn-game"><a href="game-jodi.php?game_id=<?=$game_id ?>">Jodi</a></button>
              <button class="btn-game"><a href="game-harup.php?game_id=<?=$game_id ?>">Harup</a></button>
              <button class="btn-game"><a href="game-crossing.php?game_id=<?=$game_id ?>">Crossing</a></button>
              <button class="btn-game"><a href="game-no-to-no.php?game_id=<?=$game_id ?>">N to N</a></button>
              <button class="btn-game"><a  href="game-copy-paste.php?game_id=<?=$game_id ?>">Copy Paste</a></button>
            </div>