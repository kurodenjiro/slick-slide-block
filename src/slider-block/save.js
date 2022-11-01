export default function Save(props) {
    const { id, testimonials } = props.attributes;
    const carouselIndicators = testimonials.map(function (testimonial, index) {
        return (
            <li
                data-target={"#" + id}
                data-slide-to={index}
                className={testimonial.index == 0 ? "active" : ""}
            />
        );
    });
    const testimonialsList = testimonials.map(function (testimonial) {
        const carouselClass =
            testimonial.index == 0 ? "carousel-item active" : "carousel-item";
        return (
            <div className={carouselClass} key={testimonial.index}>
                <blockquote className="testimonial">
                    <p>
                        <span className="testimonial-index" style={{ display: "none" }}>
                            {testimonial.index}
                        </span>
                    </p>
                    {testimonial.content && (
                        <p className="testimonial-text-container">
                            <i className="fa fa-quote-left pull-left" aria-hidden="true" />
                            <span className="testimonial-text">{testimonial.content}</span>
                            <i class="fa fa-quote-right pull-right" aria-hidden="true" />
                        </p>
                    )}
                    <div className="row">
                        {testimonial.image && (
                            <div className="everise__picture col-3">
                                <img src={testimonial.image} style={{ display: "none" }} />
                                <div
                                    className="everise__picture__image"
                                    style={{
                                        backgroundImage: `url(${testimonial.image})`,
                                    }}
                                />
                            </div>
                        )}
                        <div className="testimonial-author-container mt-3 col-9">
                            {testimonial.author && (
                                <p className="testimonial-author-name">
                                    <span className="testimonial-author">
                                        &mdash; <span>{testimonial.author}</span>
                                    </span>
                                </p>
                            )}
                            {testimonial.link && (
                                <p className="testimonial-author-container">
                                    <a rel="noopener" target="_blank" className="testimonial-url" href={testimonial.link} >
                                        <i className="fas fa-user" />
                                        <span className="testimonial-author-link">
                                            {testimonial.link}
                                        </span>
                                    </a>
                                </p>
                            )}
                        </div>
                    </div>
                </blockquote>
            </div>
        );
    });
    if (testimonials.length > 0) {
        return (
            <div className="testimonial-slider">
                <div className="carousel slide" data-ride="carousel" id={id}>
                    <ol className="carousel-indicators">{carouselIndicators}</ol>
                    <div className="carousel-inner w-75 mx-auto" id="slick-slider">
                        {testimonialsList}
                    </div>
                </div>
            </div>
        );
    } else return null;
}