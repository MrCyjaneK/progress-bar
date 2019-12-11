<?xml version="1.0" encoding="UTF-8"?>
<svg width="<?php echo $t['title_width'] + $t['progress_width'];?>" height="20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" preserveAspectRatio="xMidYMid">
  <linearGradient id="a" x2="0" y2="100%">
    <stop offset="0" stop-color="#bbb" stop-opacity=".1"/>
    <stop offset="1" stop-opacity=".1"/>
  </linearGradient>

  <rect rx="4" x="0" width="<?php echo $t['title_width'] + $t['progress_width']; ?>" height="20" fill="<?php echo $t['title_color']; ?>"/>
  <rect rx="4" x="<?php echo $t['title_width']; ?>" width="<?php echo $t['progress_width']; ?>" height="20" fill="#555" />
  <rect rx="4" x="<?php echo $t['title_width']; ?>" width="<?php echo intval($t['progress']/$t['scale']*$t['progress_width']) ?>" height="20" fill="<?php echo $t['progress_color']; ?>" />
  <?php if (!empty($t['title'])) { ?>
    <path fill="<?php echo $t['progress_color']; ?>" d="M<?php echo $t['title_width']; ?> 0h4v20h-4z" />
  }
  <?php } ?>
  <rect rx="4" width="<?php echo $t['title_width'] + $t['progress_width']; ?>" height="20" fill="url(#a)" />

  <?php if (!empty($t['title'])) { ?>
    <g fill="#fff" text-anchor="left" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11">
      <text x="4" y="15" fill="#010101" fill-opacity=".3">
        <?php echo $t['title']; ?>
      </text>
      <text x="4" y="14">
        <?php echo $t['title']; ?>
      </text>
    </g>
  <?php } ?>

  <g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11">
    <text x="<?php echo $t['progress_width']/2 + $t['title_width']; ?>" y="15" fill="#010101" fill-opacity=".3">
      <?php echo $t['progress'].$t['suffix']; ?>
    </text>
    <text x="<?php echo $t['progress_width']/2 + $t['title_width']; ?>" y="14">
      <?php echo $t['progress'].$t['suffix']; ?>
    </text>
  </g>
</svg>