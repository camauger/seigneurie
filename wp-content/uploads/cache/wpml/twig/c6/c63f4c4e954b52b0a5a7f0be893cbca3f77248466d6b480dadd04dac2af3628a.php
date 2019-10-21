<?php

/* troubleshooting.twig */
class __TwigTemplate_6bc46e7fc5bcdbb8aa7c34b75990899a966ec97ab6039d6ae22732c2ce9e62b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"wrap wcml_trblsh\">
    <h2>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "troubl", array()), "html", null, true);
        echo "</h2>
    <div class=\"wcml_trbl_warning\">
        <h3>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "backup", array()), "html", null, true);
        echo "</h3>
    </div>
    <div class=\"trbl_variables_products\">
        <h3>";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync", array()), "html", null, true);
        echo "</h3>
        <ul>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_update_product_count\" />
                    ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "upd_prod_count", array()), "html", null, true);
        echo "
                    <span class=\"var_status\">";
        // line 13
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "prod_var", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_product_variations\" checked=\"checked\" />
                    ";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_var", array()), "html", null, true);
        echo "
                    <span class=\"var_status\">";
        // line 21
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_gallery_images\" />
                    ";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_gallery", array()), "html", null, true);
        echo "
                    <span class=\"gallery_status\">";
        // line 30
        echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_categories\" />
                    ";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_cat", array()), "html", null, true);
        echo "
                    <span class=\"cat_status\">";
        // line 38
        echo twig_escape_filter($this->env, ($context["prod_categories_count"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_duplicate_terms\" ";
        // line 45
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        echo " />
                    ";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "dup_terms", array()), "html", null, true);
        echo "
                    <select id=\"attr_to_duplicate\" ";
        // line 47
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            echo "disabled=\"disabled\"";
        }
        echo " >
                        ";
        // line 48
        if (twig_test_empty(($context["all_products_taxonomies"] ?? null))) {
            // line 49
            echo "                            <option value=\"0\" >";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "none", array()), "html", null, true);
            echo "</option>
                        ";
        }
        // line 51
        echo "
                        ";
        // line 52
        $context["terms_count"] = 0;
        // line 53
        echo "                        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["all_products_taxonomies"] ?? null));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["tax"]) {
            // line 54
            echo "                            ";
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 55
                echo "                                ";
                $context["terms_count"] = $this->getAttribute($context["tax"], "terms_count", array());
                // line 56
                echo "                            ";
            }
            // line 57
            echo "
                            <option value=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($context["tax"], "tax_key", array()));
            echo "\" rel=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["tax"], "terms_count", array()), "html", null, true);
            echo "\">
                                ";
            // line 59
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($this->getAttribute($context["tax"], "labels", array()), "name", array())), "html", null, true);
            echo "
                            </option>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tax'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "                    </select>
                    <span class=\"attr_status\">";
        // line 63
        echo twig_escape_filter($this->env, ($context["terms_count"] ?? null), "html", null, true);
        echo "</span>&nbsp;
                    <span>";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>

            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_sync_stock\" />
                    ";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_stock", array()), "html", null, true);
        echo "
                    <span class=\"stock_status\">";
        // line 72
        echo twig_escape_filter($this->env, ($context["sync_stock_count"] ?? null), "html", null, true);
        echo "</span>
                    <span>";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <label>
                    <input type=\"checkbox\" id=\"wcml_fix_relationships\" />
                    ";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "sync_relationships", array()), "html", null, true);
        echo "
                    <span class=\"relationships_status\">";
        // line 80
        echo twig_escape_filter($this->env, ($context["fix_relationships_count"] ?? null), "html", null, true);
        echo "</span>
                    <span>";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "left", array()), "html", null, true);
        echo "</span>
                </label>
            </li>
            <li>
                <button type=\"button\" class=\"button-secondary\" id=\"wcml_trbl\">";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "start", array()), "html", null, true);
        echo "</button>
                <input id=\"count_prod_variat\" type=\"hidden\" value=\"";
        // line 86
        echo twig_escape_filter($this->env, ($context["prod_with_variations"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_prod\" type=\"hidden\" value=\"";
        // line 87
        echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_galleries\" type=\"hidden\" value=\"";
        // line 88
        echo twig_escape_filter($this->env, ($context["prod_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_categories\" type=\"hidden\" value=\"";
        // line 89
        echo twig_escape_filter($this->env, ($context["prod_categories_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_terms\" type=\"hidden\" value=\"";
        // line 90
        echo twig_escape_filter($this->env, ($context["terms_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_stock\" type=\"hidden\" value=\"";
        // line 91
        echo twig_escape_filter($this->env, ($context["sync_stock_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"count_relationships\" type=\"hidden\" value=\"";
        // line 92
        echo twig_escape_filter($this->env, ($context["fix_relationships_count"] ?? null), "html", null, true);
        echo "\"/>
                <input id=\"sync_galerry_page\" type=\"hidden\" value=\"0\"/>
                <input id=\"sync_category_page\" type=\"hidden\" value=\"0\"/>
                <span class=\"spinner\"></span>
                ";
        // line 96
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_update_count", array());
        echo "
                ";
        // line 97
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_variations", array());
        echo "
                ";
        // line 98
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_gallery_images", array());
        echo "
                ";
        // line 99
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_categories", array());
        echo "
                ";
        // line 100
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_duplicate_terms", array());
        echo "
                ";
        // line 101
        echo $this->getAttribute(($context["nonces"] ?? null), "trbl_sync_stock", array());
        echo "
                ";
        // line 102
        echo $this->getAttribute(($context["nonces"] ?? null), "fix_relationships", array());
        echo "
            </li>
        </ul>
        ";
        // line 105
        if (($context["product_type_sync_needed"] ?? null)) {
            // line 106
            echo "            <h3>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "delete_terms", array()), "html", null, true);
            echo "</h3>
            <div>
                <button type=\"button\" class=\"button-secondary\" id=\"wcml_product_type_trbl\">";
            // line 108
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "start", array()), "html", null, true);
            echo "</button>
                <span class=\"product_type_spinner\"></span>
                <span class=\"product_type_fix_done\" style=\"display: none\">";
            // line 110
            echo twig_escape_filter($this->env, $this->getAttribute(($context["strings"] ?? null), "product_type_fix_done", array()), "html", null, true);
            echo "</span>
                ";
            // line 111
            echo $this->getAttribute(($context["nonces"] ?? null), "trbl_product_type_terms", array());
            echo "
            </div>
        ";
        }
        // line 114
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "troubleshooting.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  329 => 114,  323 => 111,  319 => 110,  314 => 108,  308 => 106,  306 => 105,  300 => 102,  296 => 101,  292 => 100,  288 => 99,  284 => 98,  280 => 97,  276 => 96,  269 => 92,  265 => 91,  261 => 90,  257 => 89,  253 => 88,  249 => 87,  245 => 86,  241 => 85,  234 => 81,  230 => 80,  226 => 79,  217 => 73,  213 => 72,  209 => 71,  199 => 64,  195 => 63,  192 => 62,  175 => 59,  169 => 58,  166 => 57,  163 => 56,  160 => 55,  157 => 54,  139 => 53,  137 => 52,  134 => 51,  128 => 49,  126 => 48,  120 => 47,  116 => 46,  110 => 45,  101 => 39,  97 => 38,  93 => 37,  84 => 31,  80 => 30,  76 => 29,  66 => 22,  62 => 21,  58 => 20,  49 => 14,  45 => 13,  41 => 12,  33 => 7,  27 => 4,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "troubleshooting.twig", "E:\\inetpub\\wwwroot\\seigneurieiledorleans.com\\contenu\\wp-content\\plugins\\woocommerce-multilingual\\templates\\troubleshooting.twig");
    }
}
