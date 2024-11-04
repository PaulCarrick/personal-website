import React from 'react';

const ExpandableSection = ({ description, id, rowClassName, firstImageUrl, firstParagraph, imageArray }) => {
  return (
    <div>
      {/* {description} Section */}
      <div className="container" id={id}>
        <div className="align-items-center row">
          <div className="col-lg-4 mb-1">
            <h1 className="display-4 fw-bold mb-1 text-dark">{description}</h1>
          </div>
          <div className="col-lg-8 mb-1">
            <div className="bg-white mb-1 p-3 shadow" style={{ position: 'relative' }}>
              <a href={firstImageUrl} target="_blank" rel="noopener noreferrer">
                <img src={firstImageUrl} className="img-fluid me-2 w-50" alt={description} />
              </a>
            </div>
          </div>
        </div>
      </div>

      {/* Paragraph Section with Image Array */}
      <div className="container">
        <div className="align-items-center row">
          <div className="col-lg-4 mb-1"></div>
          <div className="col-lg-8 mb-1">
            <p>
              {firstParagraph}
              <button
                className="btn btn-link p-0 text-dark"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target={`.${rowClassName}`}
                aria-expanded="false"
                id={`toggle${description}Button`}
              >
                Show more...
              </button>
            </p>
            <div className={`collapse ${rowClassName}`}>
              {imageArray.map((item, index) => (
                <div key={index} className="mb-3">
                  {item.caption && (
                    <div className="align-items-start row">
                      <div className="col-lg-1 mb-1"></div>
                      <div className="col-lg-3 mb-1">
                        <h3 className="display-5 fw-bold mb-1 text-dark" style={{ fontSize: '1.25em' }}>
                          {item.caption}
                        </h3>
                      </div>
                      <div className="col-lg-8 mb-1"></div>
                    </div>
                  )}
                  <div className={`align-items-start row`}>
                    <div className="col-lg-1 mb-1"></div>
                    <div className="col-lg-3 mb-1">
                      <a href={item.url} target="_blank" rel="noopener noreferrer">
                        <img src={item.url} className="img-fluid me-2 w-50" alt={`${description} ${index + 1}`} />
                      </a>
                    </div>
                    <div className="col-lg-8 mb-1">
                      <p className="fw-light mb-1">{item.paragraph}</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default ExpandableSection;
