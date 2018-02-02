<section class="subscribe">
    <div class="container">
        <div class="subscribe-content">
            <h1>
                <?php if(get_field('newsletter_form_header')) {
                    the_field('newsletter_form_header');
                } else {
                    echo 'Stay Informed';
                }?>
            </h1>
            <p>
                <?php if(get_field('subscribe_description')) {
                    the_field('subscribe_description');
                } else {
                    echo 'Sign up to our newsletter and get the latest tips';
                }?>
            </p>
            <form action="https://baalspots.createsend.com/t/i/s/atdgj/" method="post" id="subForm">
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="email" name="cm-atdgj-atdgj" required />
                    </div>
                    <div class="control">
                        <button class="button is-primary" type="submit">
                        Subscribe
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>