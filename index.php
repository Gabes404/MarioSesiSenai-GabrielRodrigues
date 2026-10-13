<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mario Jump</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
</head>
<body>
    <div class="game-container">
        <header class="hud-bar">
            <div class="player-info">
                <span class="label">PONTOS:</span>
                <span class="value" id="hud-player-name">--</span>
            </div>

            <div class="score-info">
                <span class="label">PONTOS:</span>
                <span class="value" id="score-display">0</span>
            </div>
        </header>
        <main class="game-board" id="game-board">
            <img src="assets/clouds.png" class="clouds" alt="Nuvens">
            <img src="assets/mario.gif" class="mario" alt="Mario">
            <img src="assets/pipe.png" class="pipe" alt="Cano">

            <span class="jump-tip" id="jump-tip">
                Pressione ESPAÇO ou clique para pular
            </span>
        </main>        
    </div>
    <div class="modal-overlay active" id="start-modal">
        <div class="modal-card">
            <div class="modal-header">
                <h1 class="game-title">MARIO JUMP</h1>
                <p class="game-subtitle">
                    Corra, desvie dos canos e dispute o topo do ranking!
                </p>
            </div>
            <form class="start-form" id="start-form">
                <div class="input-group">
                    <label for="player-input">DIGITE SEU NOME</label>

                    <input 
                        type="text"
                        id="player-input"
                        placeholder="Ex: Seu Nome"
                        maxlength="30"
                        required
                        autocomplete="off"
                        autofocus
                    >
                </div>

                <div class="modal-actions">
                    <button type="submit"
                            class= "btn btn-primary"
                            id="btn-start">
                        INICIAR JOGO           
                    </button>

                    <button type="button" 
                            class="btn btn-secondary" 
                            id="btn-view-ranking">
                            VER RANKING
                    </button>
                </div>
            </form>
            <div class="server-status" id="server-status">
                <span class="status-dot online"></span>Conectado ao MySQL
            </div>
        </div>
    </div>

    <!-- TELA DE GAME OVER & RANKING -->
     <div class="modal-overlay" id="gameover-modal">
        <div class="modal-card gameover-card">
            <div class="modal-header">
                <h2 class="gameover-title">GAME OVER</h2>
                <div class="final-score-label">SUA PONTUAÇÃO</div>
                <div class="final-score-num" id="final-score-value">0</div>
                <div class="save-status" id="save-status-msg"></div>
            </div>
        </div>
        <!-- TABELA COM O TOP 10 PELO AMOR DE DEUS -->
         <div class="ranking-container">
            <h3 class="ranking-title">🏆 TOP 10 MELHORES PONTUAÇÕES</h3>
            <div class="table-wrapper">
                <table class="ranking-table">
                    <thead>
                        <tr>
                            <th>POS</th>
                            <th>JOGADOR</th>
                            <th>PONTUAÇÃO</th>
                        </tr>
                    </thead>
                    <tbody id="ranking-body">
                        <?php if(!empty($rankingInicial)) : ?>
                            <?php foreach ($rankingInicial as $i => $row) : ?>
                                <tr>
                                    <td class="ranking-pos">
                                        <?= $i === 0 ? '🥇 1º' : ($i === 1 ? '🥈 2º' : ($i === 2 ? '🥉 3º' : ($i + 1) . 'º'))?>
                                    </td>
                                    <td><strong><?= htmlspecialchars($row['nome'])?></strong></td>
                                    <td><?= (int)$row['pontos'] ?> pts</td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else :?>
                                    <tr>
                                        <td colspan ="3" class="loading-cell">Nenhuma pontuacao</td>
                                    </tr>
                                    <?php endif; ?>

                    </tbody>
                </table>
            </div>
         </div>
         <div class="modal-actions">
            <button type="button" class="btn btn-primary" id="btn-restart">jogar novamente</button>
            <button type="button" class="btn btn-secondary" id="btn-change-player">Trocar JOGADOR</button>

         </div>
     </div>

<script src="js/script.js" defer></script>
</body>
</html>