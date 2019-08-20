# Rector Training Step by Step


## A. Theory

- what Rector is (why it was created - story!)
- how it works & what it uses (AST, nikic/php-parser, PHPStan)
- how to configure it (`rector.yaml`)
- simple to use!

### Workflow

- show on 1 practical example  
    - use coding standard
    - instant refactoring/upgrades 
    - why keep manual and automated changes separated
    
### Is it safe to Automatically Refactor?

(ask people)

- the most common fears
    - will it break my code
    - how does is know the context (vs. coding standrards + regulars)
    - what will be the output
    - my code is too complicated/huge/ugly/old to automatically refactor

- insure 
    - driven by community
    - x contributors
    - used by big companies (Glami, Spaceflow, Entrydo any millions others but we don't have space for them here :)
    - runs on PHPStan
    - `--dry-run`
    - start with 1 rule

## B. Practice

### 1. Install Rector

- clone this repository :check:

```bash
git clone git@github.com:rectorphp/rector-training.git
```

### 2. First Changes

(2-3 general examples)

- how to rename a class in whole project (with `rector.yaml`) - instant upgrade (we know what must be changed, e.g. PHP deprecations)
- rename function (`mt_rand()` → `random_int()`)

### 3. More Complex Problems

- instant refactoring (we have to figure out the result - now together!)

- complete PHP 7.1 type declarations - return type, param type, @param array → @param int[]

- how to get to PSR-4
    - theory (from what code)
    - practical (show it in example - class without namespace, 2 classes in one file, wrong namespace, underscored_namespace)

### 4. Your Real Problems 

- your own fist rule    
- @todo build from answers
