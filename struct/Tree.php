<?php

class Tree {
    public $value;
    public $left;
    public $right;

    public function  __construct(int $value) {
        $this->value = $value;
    }

    public function insertLeft(int $value) {
        $this->left = new static($value);
    }

    public function insertRight(int $value) {
        $this->right = new static($value);
    }

    public function traverse(&$stack = []) {
        if ($this->value == null) {
            return $stack;
        }

        if ($this->left) {
            $this->left->traverse($stack);
        }

        $stack[] = $this->value;

        if ($this->right) {
            $this->right->traverse($stack);
        }

        return $stack;
    }

    public function preTraverse(&$stack = []) {
        if ($this->value == null) {
            return $stack;
        }

        $stack[] = $this->value;
        
        if ($this->left) {
            $this->left->preTraverse($stack);
        }

        if ($this->right) {
            $this->right->preTraverse($stack);
        }

        return $stack;
    }

    public function postTraverse(&$stack = []) {
        if ($this->value == null) {
            return $stack;
        }

        if ($this->left) {
            $this->left->postTraverse($stack);
        }

        if ($this->right) {
            $this->right->postTraverse($stack);
        }

        $stack[] = $this->value;

        return $stack;
    }

    public function search(int $value) {
        if ($this->value == $value) {
            return true;
        }

        if ($this->left && $this->left->search($value)) {
            return true;
        }

        if ($this->right && $this->right->search($value)) {
            return true;
        }

        return false;
    }

    public function isLeaf() {
        return $this->left==null && $this->right==null;
    }

    public function delete(int $value) {
        if ($this->value == null) {
            return $this;
        }

        if ($this->left && $this->left->search($value)) {
            $this->left = $this->left->delete($value);

        }else if ($this->right && $this->right->search($value)) {
            $this->right = $this->right->delete($value);

        }else if ($this->value == $value) {
            if ($this->isLeaf()) {
                return null;

            }else if ($this->left==null || $this->right==null) {
                return $this->left ? $this->left : $this->right;

            }else {
                $node = $this;

                while($node->left!=null) {
                    $node = $node->left;
                }


                $this->value = $node->value;
                $node->value = $value;
                return $this->delete($value);
            }
        }

        return $this;
    }

    public function print($depth = 0) {
        $print = function($val, $depth) {
            $repeat = function ($d) {
                $str = '';
                $sign = "-----";

                while($d > 0) {
                    $str .= $sign;
                    $d--;
                }
                return $str;
            };

            echo "{$repeat($depth)}{$val}" . PHP_EOL;
        };

        $print($this->value, $depth);
        $depth += 1;

        if ($this->left) {
            $this->left->print($depth);
        }

        if ($this->right) {
            $this->right->print($depth);
        }
    }

}


$tree = new Tree(10);
$tree->insertLeft(9);
$tree->insertRight(16);

$tree->left->insertLeft(1);
$tree->left->insertRight(11);

$tree->right->insertLeft(5);
$tree->right->insertRight(15);

// $tree->print();

// print_r($tree->traverse());

// var_dump($tree->search(1));

$tree = $tree->delete(10);
$tree->print();