<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>AI駆動開発ガイド — GitHub Copilot で変わるソフトウェア開発</title>
    <style>
        body {
            background-color: #C0C0C0;
            font-family: 'Comic Sans MS', 'MS Gothic', cursive;
            color: #000080;
            margin: 0;
        }
        .main-table { width: 780px; margin: 0 auto; background-color: #FFFFFF; border: 3px ridge #808080; }
        .header-cell { background: linear-gradient(to bottom, #000080, #0000CD); color: #FFFF00; text-align: center; padding: 15px; }
        .header-cell h1 { font-size: 26px; text-shadow: 2px 2px #000000; margin: 5px; }
        .nav-bar { background-color: #000080; padding: 8px; text-align: center; }
        .nav-bar a { color: #00FFFF; text-decoration: none; font-weight: bold; padding: 5px 15px; font-size: 13px; }
        .nav-bar a:hover { color: #FFFF00; text-decoration: underline; }
        .content { padding: 20px; font-size: 13px; }
        .section-title { background-color: #000080; color: #FFFFFF; padding: 8px 12px; font-size: 16px; font-weight: bold; margin-top: 25px; }
        .info-table { border: 2px solid #000080; border-collapse: collapse; width: 100%; margin: 10px 0; }
        .info-table td, .info-table th { border: 1px solid #000080; padding: 8px; }
        .info-table th { background-color: #000080; color: #FFFFFF; }
        .feature-header { background-color: #336699; color: #FFFFFF; padding: 10px; cursor: pointer; font-size: 14px; font-weight: bold; margin: 5px 0 0 0; border: 1px solid #000080; }
        .feature-header:hover { background-color: #4477AA; }
        .feature-detail { display: none; padding: 15px; border: 1px solid #000080; border-top: none; background-color: #F0F0FF; font-size: 12px; }
        .footer-cell { background-color: #000080; color: #C0C0C0; text-align: center; padding: 15px; font-size: 11px; }
        .footer-cell a { color: #00FFFF; }
        .faq-q { font-weight: bold; color: #000080; margin-top: 12px; }
        .faq-a { margin-left: 20px; margin-bottom: 10px; color: #333; }
        .tip-box { background-color: #FFFFCC; border: 2px dashed #CC9900; padding: 10px; margin: 8px 0; font-size: 12px; }
        hr { border: none; height: 1px; background-color: #000080; margin: 20px 0; }
    </style>
    <script language="JavaScript">
    <!--
    function toggleFeature(id) {
        var el = document.getElementById(id);
        if (el.style.display == 'block') {
            el.style.display = 'none';
        } else {
            el.style.display = 'block';
        }
    }
    //-->
    </script>
</head>
<body>

<table class="main-table" cellpadding="0" cellspacing="0">
    <tr>
        <td class="header-cell">
            <h1>AI駆動開発ガイド</h1>
            <font size="3">GitHub Copilot で変わるソフトウェア開発</font>
        </td>
    </tr>

    <tr>
        <td class="nav-bar">
            <a href="#about">AI駆動開発とは</a> | 
            <a href="#features">機能紹介</a> | 
            <a href="#faq">よくあるご質問</a> | 
            <a href="#tips">おすすめリソース</a>
        </td>
    </tr>

    <tr>
        <td class="content">

            <!-- AI駆動開発とは -->
            <a name="about"></a>
            <div class="section-title">AI駆動開発とは</div>
            <p>
                <b>AI駆動開発（AI-Driven Development）</b>とは、AIツールを活用してソフトウェア開発のあらゆる工程を
                加速・自動化する新しい開発手法です。コード生成、レビュー、テスト、ドキュメント作成など、
                開発ライフサイクル全体にAIを組み込みます。
            </p>

            <table class="info-table">
                <tr><th colspan="2">AI駆動開発の現状（2025年調査）</th></tr>
                <tr><td width="50%"><b>開発者のAIツール利用率</b></td><td><font color="#FF0000"><b>97%</b></font> が業務でAIを利用</td></tr>
                <tr><td><b>コーディング速度の向上</b></td><td>平均 <font color="#FF0000"><b>55%</b></font> 高速化</td></tr>
                <tr><td><b>GitHub Copilot ユーザー数</b></td><td>全世界で <font color="#FF0000"><b>1,500万人以上</b></font></td></tr>
                <tr><td><b>Fortune 500 企業の採用率</b></td><td><font color="#FF0000"><b>77%</b></font> が導入済み</td></tr>
                <tr><td><b>開発者の満足度</b></td><td><font color="#FF0000"><b>92%</b></font> がAIツールに満足</td></tr>
            </table>

            <hr>

            <!-- 機能紹介 -->
            <a name="features"></a>
            <div class="section-title">機能紹介</div>
            <p>各機能をクリックすると詳細が表示されます。</p>

            <!-- Instruction File -->
            <div class="feature-header" onclick="toggleFeature('instruction')">
                📝 Instruction File（カスタム指示）
            </div>
            <div class="feature-detail" id="instruction">
                <b>概要:</b> <code>.github/copilot-instructions.md</code> ファイルにプロジェクト固有のルールを記載することで、
                Copilot の応答をカスタマイズできます。<br><br>
                <b>主な用途:</b><br>
                ・使用言語やフレームワークの指定<br>
                ・コーディング規約の定義<br>
                ・プロジェクト構造の説明<br>
                ・レビュー時の注意点<br><br>
                <b>リンク:</b><br>
                ・<a href="https://docs.github.com/en/copilot/customizing-copilot/adding-repository-custom-instructions-for-github-copilot" target="_blank">公式ドキュメント</a>
            </div>

            <!-- Skills -->
            <div class="feature-header" onclick="toggleFeature('skills')">
                🛠️ Skills（スキル）
            </div>
            <div class="feature-detail" id="skills">
                <b>概要:</b> 再利用可能なプロンプトテンプレートをリポジトリに保存し、Copilot の専門知識として活用できる機能です。<br><br>
                <b>主な用途:</b><br>
                ・フロントエンドのブランドガイドライン<br>
                ・テスト作成のベストプラクティス<br>
                ・コードレビューの基準定義<br>
                ・特定ドメインの専門知識<br><br>
                <b>配置場所:</b> <code>.github/skills/</code><br><br>
                <b>リンク:</b><br>
                ・<a href="https://docs.github.com/en/copilot/customizing-copilot/extending-copilot-chat-in-vs-code/using-copilot-skills" target="_blank">公式ドキュメント</a>
            </div>

            <!-- Custom Agent -->
            <div class="feature-header" onclick="toggleFeature('agent')">
                🤖 Custom Agent（カスタムエージェント）
            </div>
            <div class="feature-detail" id="agent">
                <b>概要:</b> 特定のタスクに特化したAIエージェントを定義し、VS Code の Copilot Chat から呼び出せる機能です。<br><br>
                <b>主な用途:</b><br>
                ・コード生成の自動化<br>
                ・デバッグ支援<br>
                ・ドキュメント生成<br>
                ・特定ワークフローの自動実行<br><br>
                <b>配置場所:</b> <code>.github/agents/</code><br><br>
                <b>リンク:</b><br>
                ・<a href="https://docs.github.com/en/copilot/customizing-copilot/extending-copilot-chat-in-vs-code/creating-a-custom-chat-agent" target="_blank">公式ドキュメント</a>
            </div>

            <!-- Agentic Workflow -->
            <div class="feature-header" onclick="toggleFeature('agentic')">
                ⚡ Agentic Workflow（エージェントワークフロー）
            </div>
            <div class="feature-detail" id="agentic">
                <b>概要:</b> GitHub Actions のワークフロー内で Copilot を活用し、コード変更に応じた自律的なタスクを実行する仕組みです。<br><br>
                <b>主な用途:</b><br>
                ・コード変更時のドキュメント自動更新<br>
                ・テストカバレッジレポートの自動生成<br>
                ・リリースノートの自動作成<br>
                ・コードの自動リファクタリング提案<br><br>
                <b>リンク:</b><br>
                ・<a href="https://github.com/github/gh-aw" target="_blank">gh-aw リポジトリ</a>
            </div>

            <!-- Cloud Agent -->
            <div class="feature-header" onclick="toggleFeature('cloud')">
                ☁️ Cloud Agent（クラウドエージェント）
            </div>
            <div class="feature-detail" id="cloud">
                <b>概要:</b> GitHub Issue にアサインするだけで、Copilot がクラウド上で自律的にコードを実装し、Pull Request を作成する機能です。<br><br>
                <b>主な用途:</b><br>
                ・Issue ベースの自動実装<br>
                ・バグ修正の自動化<br>
                ・機能追加の自律実装<br>
                ・テスト付きPRの自動作成<br><br>
                <b>リンク:</b><br>
                ・<a href="https://docs.github.com/en/copilot/concepts/agents/cloud-agent/about-cloud-agent" target="_blank">公式ドキュメント</a>
            </div>

            <!-- CLI -->
            <div class="feature-header" onclick="toggleFeature('cli')">
                💻 Copilot CLI（コマンドラインインターフェース）
            </div>
            <div class="feature-detail" id="cli">
                <b>概要:</b> ターミナル上で動作する対話型AIアシスタント。コード生成、レビュー、リファクタリングなどを自律的に実行できます。<br><br>
                <b>主なコマンド:</b><br>
                ・<code>/model</code> — AIモデルの選択<br>
                ・<code>/review</code> — コードレビュー実行<br>
                ・<code>/fleet</code> — 複数エージェントの並列実行<br>
                ・<code>/init</code> — リポジトリのスキャンと初期設定<br><br>
                <b>リンク:</b><br>
                ・<a href="https://docs.github.com/en/copilot/github-copilot-in-the-cli" target="_blank">公式ドキュメント</a>
            </div>

            <!-- MCP Server -->
            <div class="feature-header" onclick="toggleFeature('mcp')">
                🔌 MCP Server（Model Context Protocol）
            </div>
            <div class="feature-detail" id="mcp">
                <b>概要:</b> Model Context Protocol (MCP) は、AIモデルに外部ツールやデータソースへのアクセスを提供するオープンプロトコルです。MCP Server を追加することで、Copilot の機能を拡張できます。<br><br>
                <b>主なMCP Server:</b><br>
                ・<b>GitHub MCP Server</b> — リポジトリ、Issue、PR、ブランチ情報へのアクセス<br>
                ・<b>Playwright MCP Server</b> — ブラウザ操作、スクリーンショット、E2Eテスト<br>
                ・<b>データベース MCP Server</b> — SQL実行、スキーマ参照<br>
                ・<b>Fetch MCP Server</b> — 外部API・ウェブページへのアクセス<br><br>
                <b>設定場所:</b> <code>.vscode/mcp.json</code><br><br>
                <b>リンク:</b><br>
                ・<a href="https://modelcontextprotocol.io/" target="_blank">MCP 公式サイト</a><br>
                ・<a href="https://github.com/modelcontextprotocol/servers" target="_blank">MCP Servers 一覧</a>
            </div>

            <!-- Harness Engineering -->
            <div class="feature-header" onclick="toggleFeature('harness')">
                🏗️ Harness Engineering（ハーネスエンジニアリング）
            </div>
            <div class="feature-detail" id="harness">
                <b>概要:</b> Harness Engineering とは、AIエージェントが最大限の能力を発揮できるように、プロジェクトの構造・指示・コンテキストを整備する技術です。AIを「手綱（ハーネス）」で導くように、適切な環境を構築します。<br><br>
                <b>主な実践:</b><br>
                ・<b>Instruction File</b> — プロジェクトのルール・制約をAIに伝える<br>
                ・<b>Skills</b> — ドメイン知識をAIに提供<br>
                ・<b>MCP Server</b> — 外部ツールとの接続を整備<br>
                ・<b>Plan Mode</b> — 実装前に計画を立てさせる<br>
                ・<b>コンテキスト管理</b> — 必要な情報を適切なタイミングでAIに提供<br><br>
                <b>ポイント:</b> AIの能力は同じでも、ハーネスの質によって結果が大きく変わります。良いハーネスエンジニアリングは、AIの出力品質を劇的に向上させます。
            </div>

            <hr>

            <!-- FAQ -->
            <a name="faq"></a>
            <div class="section-title">よくあるご質問</div>

            <p class="faq-q">Q: AI駆動開発を始めるには何が必要ですか？</p>
            <p class="faq-a">A: GitHub アカウントと GitHub Copilot のライセンス（Pro/Business/Enterprise）があれば始められます。</p>

            <p class="faq-q">Q: AIが生成したコードの品質は信頼できますか？</p>
            <p class="faq-a">A: AIの提案はあくまで出発点です。Code Review、GHAS、テスト自動化と組み合わせることで品質を担保します。</p>

            <p class="faq-q">Q: どのプログラミング言語に対応していますか？</p>
            <p class="faq-a">A: Python、JavaScript、TypeScript、Java、C#、Go、Ruby など主要な言語に対応しています。</p>

            <p class="faq-q">Q: セキュリティ上の懸念はありませんか？</p>
            <p class="faq-a">A: GitHub Copilot Business/Enterprise ではコードがモデル学習に使用されることはありません。また、GHAS と組み合わせることでセキュリティスキャンも可能です。</p>

            <p class="faq-q">Q: チーム全体で導入するメリットは？</p>
            <p class="faq-a">A: GitHub の調査では、Copilot 導入チームは開発速度が55%向上し、開発者の満足度が92%に達しています。</p>

            <hr>

            <!-- おすすめリソース -->
            <a name="tips"></a>
            <div class="section-title">📦 おすすめリソース — awesome-copilot から導入</div>
            <br>
            <p>
                <a href="https://github.com/github/awesome-copilot" target="_blank"><b>github/awesome-copilot</b></a> リポジトリには、
                コミュニティが作成した Skills、Custom Agent、Agentic Workflow が公開されています。<br>
                以下のコマンドでプロジェクトに簡単に追加できます。
            </p>

            <font size="3" color="#000080"><b>🛠️ おすすめ Skills</b></font>
            <table class="info-table">
                <tr><th>Skill 名</th><th>説明</th><th>インストールコマンド</th></tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/tree/main/skills/acquire-codebase-knowledge" target="_blank">acquire-codebase-knowledge</a></td>
                    <td>コードベースの理解を深めるスキル</td>
                    <td><code>gh copilot skill install acquire-codebase-knowledge</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/tree/main/skills/add-educational-comments" target="_blank">add-educational-comments</a></td>
                    <td>教育的なコメントを自動追加</td>
                    <td><code>gh copilot skill install add-educational-comments</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/tree/main/skills/architecture-blueprint-generator" target="_blank">architecture-blueprint-generator</a></td>
                    <td>アーキテクチャ図の自動生成</td>
                    <td><code>gh copilot skill install architecture-blueprint-generator</code></td>
                </tr>
            </table>

            <br>
            <font size="3" color="#000080"><b>🤖 おすすめ Custom Agent</b></font>
            <table class="info-table">
                <tr><th>Agent 名</th><th>説明</th><th>インストールコマンド</th></tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/agents/accessibility.agent.md" target="_blank">accessibility</a></td>
                    <td>アクセシビリティチェック・改善エージェント</td>
                    <td><code>gh copilot agent install accessibility</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/agents/api-architect.agent.md" target="_blank">api-architect</a></td>
                    <td>API設計・レビューエージェント</td>
                    <td><code>gh copilot agent install api-architect</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/agents/Thinking-Beast-Mode.agent.md" target="_blank">Thinking-Beast-Mode</a></td>
                    <td>徹底的に考え抜く自律型コーディングエージェント</td>
                    <td><code>gh copilot agent install Thinking-Beast-Mode</code></td>
                </tr>
            </table>

            <br>
            <font size="3" color="#000080"><b>⚡ おすすめ Agentic Workflow</b></font>
            <table class="info-table">
                <tr><th>Workflow 名</th><th>説明</th><th>インストールコマンド</th></tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/workflows/daily-issues-report.md" target="_blank">daily-issues-report</a></td>
                    <td>毎日のIssueレポートを自動生成</td>
                    <td><code>gh copilot workflow install daily-issues-report</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/workflows/relevance-check.md" target="_blank">relevance-check</a></td>
                    <td>PRの関連性チェック</td>
                    <td><code>gh copilot workflow install relevance-check</code></td>
                </tr>
                <tr>
                    <td><a href="https://github.com/github/awesome-copilot/blob/main/workflows/ospo-org-health.md" target="_blank">ospo-org-health</a></td>
                    <td>Organizationの健全性レポート</td>
                    <td><code>gh copilot workflow install ospo-org-health</code></td>
                </tr>
            </table>

        </td>
    </tr>

    <tr>
        <td class="footer-cell">
            <font size="2"><b>GitHub Japan</b></font><br><br>
            <a href="https://twitter.com/GitHubJapan">🐦 Twitter</a> &nbsp;|&nbsp;
            <a href="https://www.youtube.com/@GitHubJapan">🎬 YouTube</a> &nbsp;|&nbsp;
            <a href="https://github.blog/jp/">📝 Blog</a> &nbsp;|&nbsp;
            <a href="https://github.co.jp/">🏠 GitHub Japan</a>
            <br><br>
            <font size="1">
                このページはワークショップ教材用に作成されたレガシーPHPサイトです。<br>
                Best viewed with Internet Explorer 6.0 | 推奨解像度: 800x600
            </font>
        </td>
    </tr>
</table>

</body>
</html>
