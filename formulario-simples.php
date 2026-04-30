<?php
/**
 * Plugin Name: Formulário Simples GPT
 * Description: Um formulário básico criado com ajuda do GPT
 */

if (!defined('ABSPATH')) exit;

function fs_mostrar_formulario() {
    ob_start();
    ?>

    <form method="post">
        <p>
            <label>Nome:</label><br>
            <input type="text" name="fs_nome" required>
        </p>

        <p>
            <label>Email:</label><br>
            <input type="email" name="fs_email" required>
        </p>

        <p>
            <button type="submit" name="fs_enviar">Enviar</button>
        </p>
    </form>

    <?php

    if (isset($_POST['fs_enviar'])) {
        $nome = sanitize_text_field($_POST['fs_nome']);
        $email = sanitize_email($_POST['fs_email']);

        echo "<p><strong>Recebido:</strong><br>Nome: $nome <br>Email: $email</p>";
    }

    return ob_get_clean();
}
function fs_carregar_estilos() {
    wp_enqueue_style(
        'fs-estilo',
        plugin_dir_url(__FILE__) . 'assets/style.css'
    );
}
add_action('wp_enqueue_scripts', 'fs_carregar_estilos');
add_shortcode('formulario_simples', 'fs_mostrar_formulario');
