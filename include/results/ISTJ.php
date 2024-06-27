<div class="result-top-first">
  <div>
    <div class="desc-semititle">나의 투자 본능은..</div>
    <div class="desc-title">프로 규칙러</div>
  </div>
  <div class="result-image">
    <img class="img-width <?= $resultTitleConfig['allowDownImg'] ? 'allow-context-menu' : '' ?>" src="<?= isset($customResultImageConfig) ? $customResultImageConfig  : _t("game.result{$resultScore}ImageMain", $dao->questionResult[$resultScore]['mainImg']) ?>" alt="" />
  </div>
</div>
<div class="result-top-desc">

  <div class="doughnut-chart">
    <div>
      <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="7rem" height="7rem" xmlns="http://www.w3.org/2000/svg">
        <circle class="circle-chart__background" stroke="#f582204d" stroke-width="3" fill="none" cx="17" cy="17" r="15" />
        <circle class="circle-chart__circle" stroke="#f58220" stroke-width="3" stroke-dasharray="85,100" stroke-linecap="round" fill="none" cx="17" cy="17" r="15" />
        <g class="circle-chart__info">
          <text class="circle-chart__percent" x="16.91549431" y="17.5" alignment-baseline="central" text-anchor="middle" font-size="8.5">90%</text>
        </g>
      </svg>
      <div class="chart-cate">FM력</div>
    </div>
    <div>
      <div>
        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="7rem" height="7rem" xmlns="http://www.w3.org/2000/svg">
          <circle class="circle-chart__background" stroke="#f582204d" stroke-width="3" fill="none" cx="17" cy="17" r="15" />
          <circle class="circle-chart__circle" stroke="#f58220" stroke-width="3" stroke-dasharray="80,100" stroke-linecap="round" fill="none" cx="17" cy="17" r="15" />
          <g class="circle-chart__info">
            <text class="circle-chart__percent" x="16.91549431" y="17.5" alignment-baseline="central" text-anchor="middle" font-size="8.5">80%</text>
          </g>
        </svg>
      </div>
      <div class="chart-cate">이성적 사고</div>
    </div>
    <div>
      <div>
        <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="7rem" height="7rem" xmlns="http://www.w3.org/2000/svg">
          <circle class="circle-chart__background" stroke="#f582204d" stroke-width="3" fill="none" cx="16.91549431" cy="16.91549431" r="15" />
          <circle class="circle-chart__circle" stroke="#f58220" stroke-width="3" stroke-dasharray="82,100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15" />
          <g class="circle-chart__info">
            <text class="circle-chart__percent" x="16.91549431" y="17.5" alignment-baseline="central" text-anchor="middle" font-size="8.5">85%</text>
          </g>
        </svg>
        <div class="chart-cate">광기</div>
      </div>
    </div>
  </div>