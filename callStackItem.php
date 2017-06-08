<?php
use yii\helpers\Html;
/* @var $file string|null */
/* @var $line int|null */
/* @var $class string|null */
/* @var $method string|null */
/* @var $index int */
/* @var $lines string[] */
/* @var $begin int */
/* @var $end int */
/* @var $args array */
/* @var $handler \yii\web\ErrorHandler */
?>
<li class="<?php if ($index === 1 || !$handler->isCoreFile($file)) echo 'application'; ?> call-stack-item"
    data-line="<?= (int) ($line - $begin) ?>">
    <div class="element-wrap">
        <div class="element">
            <span class="item-number"><?= (int) $index ?>.</span>
            <span class="text"><?php if ($file !== null) echo 'in ' . $handler->htmlEncode($file); ?></span>
	        <?= Html::beginTag('a', ['href' => 'phpstorm://file=' . $file . '&line=' . ($line + 1)]);?>
            <span class="at">
                <?php if ($line !== null) echo 'at line'; ?>
                <span class="line"><?php if ($line !== null) echo (int) $line + 1; ?></span>
            </span>
	        <?php Html::endTag('a');?>
            <?php if ($method !== null): ?>
                <span class="call">
                    <?php if ($file !== null) echo '&ndash;'; ?>
                    <?= ($class !== null ? $handler->addTypeLinks("$class::$method") : $handler->htmlEncode($method)) . '(' . $handler->argumentsToString($args) . ')' ?>
                </span>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($lines)): ?>
        <div class="code-wrap">
            <div class="error-line"></div>
            <?php for ($i = $begin; $i <= $end; ++$i): ?><div class="hover-line"></div><?php endfor; ?>
            <div class="code">
                <?php for ($i = $begin; $i <= $end; ++$i): ?>
	                <?= Html::a(Html::tag('span', (int)($i + 1), ['class' => 'lines-item']), 'phpstorm://file=' . $file . '&line=' . ($i + 1));?><?php endfor; ?>
                <pre><?php
                    // fill empty lines with a whitespace to avoid rendering problems in opera
                    for ($i = $begin; $i <= $end; ++$i) {
                        echo (trim($lines[$i]) === '') ? " \n" : $handler->htmlEncode($lines[$i]);
                    }
                ?></pre>
            </div>
        </div>
    <?php endif; ?>
</li>
