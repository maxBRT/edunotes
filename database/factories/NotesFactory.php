<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NotesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $htmlExamples = [
            "<h1>Introduction to the Topic</h1><h2>Overview</h2><p>This section covers the fundamental concepts that we discussed in class today.</p><h3>Key Points</h3><ul><li><strong>Important concept 1:</strong> Definition and explanation</li><li><strong>Important concept 2:</strong> Detailed breakdown</li><li><strong>Important concept 3:</strong> Examples and use cases</li></ul><h2>Examples</h2><pre>Code example or formula</pre><blockquote>Notable quote from the lecture</blockquote><h2>Summary</h2><p>Key takeaways from today's class:</p><ol><li>First main point</li><li>Second main point</li><li>Third main point</li></ol>",

            '<h1>Chapter Review</h1><h2>Main Concepts</h2><h3>Concept 1</h3><p>Detailed explanation with examples...</p><h3>Concept 2</h3><p>Further discussion of important topics...</p><h2>Practice Problems</h2><ol><li><strong>Problem 1:</strong> Description<ul><li>Solution approach</li><li>Key formula: <code>f(x) = x^2 + 2x + 1</code></li></ul></li><li><strong>Problem 2:</strong> Description<ul><li>Step-by-step solution</li><li>Final answer</li></ul></li></ol><h2>Additional Resources</h2><ul><li>Textbook pages 45-67</li><li>Online resources</li><li><a href="https://example.com">Helpful website</a></li></ul>',

            '<h1>Lecture Notes</h1><p><strong>Date:</strong> '.fake()->date()."</p><p><strong>Topic:</strong> Advanced Topics Discussion</p><h2>Agenda</h2><ol><li>Review of previous material</li><li>New concepts introduction</li><li>Practical applications</li><li>Q&A session</li></ol><hr><h2>Part 1: Foundation</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><h3>Subsection A</h3><ul><li>Point 1</li><li>Point 2</li><li>Point 3</li></ul><h3>Subsection B</h3><p>Data table with examples showing relationships between different variables and calculations.</p><h2>Part 2: Advanced Material</h2><pre>Example code or mathematical notation\ny = mx + b</pre><p><strong>Note:</strong> Don't forget to review this section before the exam!</p>",

            "<h1>Study Guide</h1><h2>Terms to Know</h2><ul><li><strong>Term 1:</strong> Definition here</li><li><strong>Term 2:</strong> Another important definition</li><li><strong>Term 3:</strong> Key concept explanation</li></ul><h2>Important Formulas</h2><pre>Formula 1: E = mc²\nFormula 2: F = ma\nFormula 3: PV = nRT</pre><h2>Things to Remember</h2><blockquote>This is particularly important for the upcoming exam!</blockquote><ol><li>Remember to review chapters 5-7</li><li>Practice the example problems</li><li>Understand the core concepts</li></ol><hr><h2>Exam Tips</h2><ul><li>Review all lecture notes</li><li>Complete practice problems</li><li>Attend study group</li><li>Ask questions during office hours</li></ul>",

            "<h1>Class Discussion Notes</h1><h2>Today's Discussion</h2><p>We covered several interesting topics:</p><h3>Topic 1</h3><p>Key arguments:</p><ul><li>Argument A</li><li>Argument B</li><li>Counter-argument C</li></ul><h3>Topic 2</h3><p>Different perspectives:</p><ol><li><strong>Perspective 1:</strong> Explanation...</li><li><strong>Perspective 2:</strong> Alternative view...</li></ol><h2>Questions Raised</h2><ul><li>How does X relate to Y?</li><li>What are the implications of Z?</li><li>Can we apply this to real-world scenarios?</li></ul><h2>Follow-up Tasks</h2><ul><li>Read assigned article</li><li>Prepare response paper</li><li>Review supplementary materials</li></ul>",
        ];

        return [
            'title' => fake()->sentence(rand(3, 6)),
            'content' => fake()->randomElement($htmlExamples),
            'school_class_id' => \App\Models\SchoolClass::factory(),
        ];
    }
}
