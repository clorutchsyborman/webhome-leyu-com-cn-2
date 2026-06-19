<?php

namespace App\Library;

class LinkCard
{
    private string $title;
    private string $description;
    private string $url;
    private string $keyword;
    private string $color;

    public function __construct(
        string $title = '乐鱼体育 - 官方网站',
        string $description = '乐鱼体育提供最专业的体育赛事直播与竞猜服务',
        string $url = 'https://webhome-leyu.com.cn',
        string $keyword = '乐鱼体育',
        string $color = '#1a73e8'
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->keyword = $keyword;
        $this->color = $color;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function setKeyword(string $keyword): void
    {
        $this->keyword = $keyword;
    }

    public function setColor(string $color): void
    {
        $this->color = $color;
    }

    public function render(): string
    {
        $html = '<div class="link-card" style="border:1px solid #ddd;border-radius:8px;padding:16px;margin:12px 0;max-width:480px;font-family:Arial,sans-serif;box-shadow:0 2px 4px rgba(0,0,0,0.1)">';
        $html .= '<div class="link-card-header" style="border-bottom:2px solid ' . $this->escapeHtml($this->color) . ';padding-bottom:8px;margin-bottom:12px">';
        $html .= '<h3 style="margin:0;font-size:18px;color:#333">' . $this->escapeHtml($this->title) . '</h3>';
        $html .= '</div>';
        $html .= '<div class="link-card-body" style="margin-bottom:12px">';
        $html .= '<p style="margin:0;font-size:14px;color:#555;line-height:1.6">' . $this->escapeHtml($this->description) . '</p>';
        $html .= '</div>';
        $html .= '<div class="link-card-footer" style="display:flex;align-items:center;justify-content:space-between">';
        $html .= '<span class="link-card-keyword" style="background:#f0f0f0;padding:4px 10px;border-radius:12px;font-size:12px;color:#666">' . $this->escapeHtml($this->keyword) . '</span>';
        $html .= '<a href="' . $this->escapeHtml($this->url) . '" target="_blank" rel="noopener noreferrer" style="color:' . $this->escapeHtml($this->color) . ';text-decoration:none;font-weight:bold;font-size:14px">访问官网 →</a>';
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    private function escapeHtml(string $value): string
    {
        return htmlspecialchars($value, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    public static function createDefault(): self
    {
        return new self();
    }

    public static function createWithCustom(string $title, string $description, string $url, string $keyword, string $color = '#1a73e8'): self
    {
        return new self($title, $description, $url, $keyword, $color);
    }
}